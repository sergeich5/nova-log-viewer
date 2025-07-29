# Laravel Nova Logs Viewer

Compatible with nova v4, v5

### Install via Composer

```bash
composer reqiure sergeich5/nova-log-viewer
```

### Register tool in NovaServiceProvider.php

```php

public function tools(): array
{
    return [
        // ...
        \Sergeich5\NovaLogViewer\NovaLogViewer::make(),
    ];
}
```
