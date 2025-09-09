<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

namespace App\Http\Controllers;

class HolidayController extends Controller
{
    public function index()
    {
        // Yaha aap DB se holidays fetch kar sakte ho
        $holidays = [
            ['date' => '2025-01-26', 'name' => 'Republic Day'],
            ['date' => '2025-08-15', 'name' => 'Independence Day'],
            ['date' => '2025-10-02', 'name' => 'Gandhi Jayanti'],
        ];

        return view('holidays.holidays', compact('holidays'));
    }
}



