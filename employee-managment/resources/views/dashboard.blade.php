@extends('layouts.app')

@section('content')
    <h2 style="font-size: 20px; font-weight: bold; margin-bottom: 15px;">
        Dashboard <span style="font-weight: normal;">(Welcome, {{ Auth::user()->name }})</span>
    </h2>

    <!-- Calendar Section -->
    <div class="calendar-wrapper">
        <!-- Left Arrow -->
        <button id="prevBtn" class="nav-btn">←</button>

        <div class="calendar-container">
            <div class="calendar-card"><div id="calendar1"></div></div>
            <div class="calendar-card"><div id="calendar2"></div></div>
            <div class="calendar-card"><div id="calendar3"></div></div>
        </div>

        <!-- Right Arrow -->
        <button id="nextBtn" class="nav-btn">→</button>
    </div>
@endsection

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/@fullcalendar/core@6.1.8/index.global.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@fullcalendar/daygrid@6.1.8/index.global.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            let startDate = new Date();

            const options = {
                initialView: 'dayGridMonth',
                headerToolbar:{
                    left: '',
                    center: 'title',
                    right: ''
                },
                height: 250
            };

            const calendars = [
                new FullCalendar.Calendar(document.getElementById('calendar1'), options),
                new FullCalendar.Calendar(document.getElementById('calendar2'), options),
                new FullCalendar.Calendar(document.getElementById('calendar3'), options)
            ];

            function renderCalendars(baseDate) {
                calendars[0].gotoDate(new Date(baseDate.getFullYear(), baseDate.getMonth(), 1));
                calendars[1].gotoDate(new Date(baseDate.getFullYear(), baseDate.getMonth() + 1, 1));
                calendars[2].gotoDate(new Date(baseDate.getFullYear(), baseDate.getMonth() + 2, 1));
                calendars.forEach(c => c.render());
            }

            renderCalendars(startDate);

            document.getElementById('nextBtn').addEventListener('click', function () {
                startDate.setMonth(startDate.getMonth() + 1);
                renderCalendars(startDate);
            });

            document.getElementById('prevBtn').addEventListener('click', function () {
                startDate.setMonth(startDate.getMonth() - 1);
                renderCalendars(startDate);
            });
        });
    </script>

    <style>
        /* Calendar wrapper */
        .calendar-wrapper {
            display: flex;
            align-items: flex-start;;
            justify-content: center;
            gap: 20px;
            margin-top: 20px;
        }
        .calendar-container {
            display: flex;
            gap: 25px;
        }
        .calendar-card {
            background: #fff;
            padding: 12px;
            border-radius: 12px;
            box-shadow: 0 2px 6px rgba(0,0,0,0.1);
            min-width: 260px;
            max-width: 260px;
            height: 240px;
            overflow: hidden;   /* Important: content bahar na nikle */
            display: flex;
            flex-direction: column; /* content vertical alignment ke liye */

        }

        /* FullCalendar Styling */
        .fc .fc-col-header-cell-cushion {
            font-size: 12px;  /* Weekdays chhote */
            font-weight: 600;
            text-align: center;
        }
        .fc .fc-daygrid-day-number {
            font-size: 11px;  /* Dates thodi compact */
            
        }
        .fc .fc-scrollgrid {
            table-layout: fixed;  /* Columns equal width */
        }

        /* Navigation buttons */
        .nav-btn {
            background: #0d6efd;
            color: #fff;
            border: none;
            border-radius: 50%;
            font-size: 20px;
            width: 40px;
            height: 40px;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .nav-btn:hover {
            background: #0b5ed7;
        }

        /* Sidebar bold color */
        .sidebar a {
    display: block;
    padding: 10px 15px;
    margin: 5px 10px;
    text-align: left;
    border: none;
    background: none;
    cursor: pointer;
    text-decoration: none;
    color: #333;
    font-size: 15px;
}
    </style>
@endpush













