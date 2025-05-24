<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class TicketSeeder extends Seeder
{
    public function run()
    {
        $randomTimestamps = [];

        // Step 1: Generate 100 timestamp acak sesuai ketentuan
        for ($i = 1; $i <= 100; $i++) {
            if ($i >= 1 && $i <= 30) {
                $year = 2023;
                $month = rand(1, 12);
            } elseif ($i >= 31 && $i <= 60) {
                $year = 2024;
                $month = rand(1, 12);
            } elseif ($i >= 61 && $i <= 80) {
                $year = 2025;
                $month = rand(1, 4);
            } else {
                $year = Carbon::today()->year;
                $month = Carbon::today()->month;
                $day = Carbon::today()->day;
                $ticket_date = Carbon::today();
            }

            if (!isset($ticket_date)) {
                $day = rand(1, 28);
                $ticket_date = Carbon::create($year, $month, $day);
            }

            $hour = rand(9, 17);
            $minute = rand(0, 59);
            $timestamp = $ticket_date->copy()->setTime($hour, $minute);

            $randomTimestamps[] = [
                'ticket_date' => $ticket_date->toDateString(),
                'timestamp' => $timestamp,
            ];

            unset($ticket_date);
        }

        // Step 2: Sort berdasarkan waktu supaya berurutan
        usort($randomTimestamps, function ($a, $b) {
            return $a['timestamp']->timestamp <=> $b['timestamp']->timestamp;
        });

        // Step 3: Generate data final dengan id berurutan
        $tickets = [];

        foreach ($randomTimestamps as $i => $timeData) {
            $id = 'SH' . str_pad($i + 1, 4, '0', STR_PAD_LEFT);
            $totalAmount = rand(15, 1000) * 1000;

            $tickets[] = [
                'id' => $id,
                'ticket_date' => $timeData['ticket_date'],
                'total_amount' => $totalAmount,
                'status' => 1,
                'created_at' => $timeData['timestamp'],
                'updated_at' => $timeData['timestamp'],
            ];
        }

        DB::table('tickets')->insert($tickets);
    }
}
