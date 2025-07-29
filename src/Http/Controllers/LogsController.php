<?php

namespace Sergeich5\NovaLogViewer\Http\Controllers;

use Laravel\Nova\Http\Requests\NovaRequest;
use Sergeich5\NovaLogViewer\Library\LogsViewer;

class LogsController
{
    function index(NovaRequest $request)
    {
        return inertia('LogViewer', [
            'logs' => (new LogsViewer)
                ->list()
                ->sortByDesc(['date', 'level', 'message'])
                ->groupBy(['date', 'level', 'message']),
        ]);
    }

    function show(NovaRequest $request, string $date)
    {
        return inertia('LogShow', [
            'date' => $date,
            'level' => strtolower($request->get('level', 'emergency')),
            'logs' => (new LogsViewer)
                ->list(function (array $item) use ($date) {
                    return $item['date'] == $date;
                })
                ->sortByDesc(['level', 'message'])
                ->groupBy(['level', 'message']),
        ]);
    }
}
