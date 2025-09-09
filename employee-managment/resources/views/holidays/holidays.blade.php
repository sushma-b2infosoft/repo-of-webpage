@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6 bg-white shadow rounded">
    <h2 class="text-xl font-bold mb-4">Holidays</h2>

    <table class="w-full border-collapse border border-gray-300">
        <thead class="bg-gray-200">
            <tr>
                <th class="border p-2"></th>
                <th class="border p-2">Date</th>
                <th class="border p-2">Holiday</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="border p-2">1</td>
                <td class="border p-2">01-Jan-2025</td>
                <td class="border p-2">New Year</td>
            </tr>
            <tr>
                <td class="border p-2">2</td>
                <td class="border p-2">14-Jan-2025</td>
                <td class="border p-2">Makar Sankranti</td>
            </tr>
            <tr>
                <td class="border p-2">3</td>
                <td class="border p-2">26-Jan-2025</td>
                <td class="border p-2">Republic Day</td>
            </tr>
            <tr>
                <td class="border p-2">4</td>
                <td class="border p-2">17-Mar-2025</td>
                <td class="border p-2">Holi</td>
            </tr>
            <tr>
                <td class="border p-2">5</td>
                <td class="border p-2">01-May-2025</td>
                <td class="border p-2">Labour Day</td>
            </tr>
            <tr>
                <td class="border p-2">6</td>
                <td class="border p-2">15-Aug-2025</td>
                <td class="border p-2">Independence Day</td>
            </tr>
            <tr>
                <td class="border p-2">7</td>
                <td class="border p-2">02-Oct-2025</td>
                <td class="border p-2">Gandhi Jayanti</td>
            </tr>
            <tr>
                <td class="border p-2">8</td>
                <td class="border p-2">31-Oct-2025</td>
                <td class="border p-2">Diwali</td>
            </tr>
            <tr>
                <td class="border p-2">9</td>
                <td class="border p-2">25-Dec-2025</td>
                <td class="border p-2">Christmas</td>
            </tr>
            <tr>
                <td class="border p-2">10</td>
                <td class="border p-2">31-Dec-2025</td>
                <td class="border p-2">New Year's Eve</td>
            </tr>
        </tbody>
    </table>
</div>
@endsection


