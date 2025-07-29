<?php

namespace Sergeich5\NovaLogViewer\Library;

use Illuminate\Support\Collection;

class LogsViewer
{
    function list(?callable $filter = null): Collection
    {
        $logs = collect();

        foreach (glob(app_path() . '/../storage/logs/*.log') as $file) {
            $data = $this->parseFile($file);

            if (!is_null($filter))
                $data = $data->filter($filter);

            $logs = $logs->merge($data);
        }

        return $logs;
    }

    private function parseFile(string $path): Collection
    {
        $result = collect([]);
        $handle = fopen($path, "r");

        if ($handle) {
            while (($line = fgets($handle)) !== false) {
                if (trim($line) == '[stacktrace]')
                    continue;
                elseif (preg_match('/^\[\d{4}-\d{2}-\d{2} \d{2}:\d{2}:\d{2}\]$/', substr($line, 0, 21)))
                    $result->push($this->parseLog($line));
                else {
                    $log = $result->pop();
                    $log['stacktrace'][] = $line;
                    $result->push($log);
                }
            }
            fclose($handle);
        }

        return $result;
    }

    /**
     * @return array{
     *     level: string,
     *     message: string,
     *     date: string,
     *     stacktrace: array,
     * }
     */
    private function parseLog(string $line): array
    {
        return [
            'level' => explode(':', explode('.', $line, 2)[1], 2)[0],
            'message' => trim(explode(':', explode('.', $line,2)[1], 2)[1]),
            'date' => substr($line, 1, 10),
            'stacktrace' => []
        ];
    }
}
