<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RefundPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissionNames = [
            'refund-shipment-payment',
            'approve-refund-requests',
        ];
        $guardName = 'web';

        $groupId = $this->resolvePermissionGroupId([
            'transactions and finance',
            'transactions',
            'shipments',
        ]);

        if (!$groupId) {
            $groupId = DB::table('permission_groups')->insertGetId([
                'name' => 'transactions and finance',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }

        foreach ($permissionNames as $permissionName) {
            $exists = DB::table('permissions')
                ->where('name', $permissionName)
                ->where('guard_name', $guardName)
                ->exists();

            if ($exists) {
                continue;
            }

            DB::table('permissions')->insert([
                'name' => $permissionName,
                'guard_name' => $guardName,
                'permission_group_id' => $groupId,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }

    /**
     * Pick the first existing permission group from a list of candidates.
     *
     * @param array $groupNames
     * @return int|null
     */
    private function resolvePermissionGroupId(array $groupNames)
    {
        foreach ($groupNames as $groupName) {
            $groupId = DB::table('permission_groups')
                ->where('name', $groupName)
                ->value('id');

            if ($groupId) {
                return (int) $groupId;
            }
        }

        return null;
    }
}
