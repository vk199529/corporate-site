<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Support\Icons\Heroicon;
use App\Models\Setting;
use Filament\Notifications\Notification;
use Filament\Forms\Components\Textarea;

class Settings extends Page implements Forms\Contracts\HasForms
{
    use Forms\Concerns\InteractsWithForms;

    protected static string | \BackedEnum | null $navigationIcon = Heroicon::OutlinedCog6Tooth;

    protected string $view = 'filament.pages.settings';

    // ✅ REQUIRED
    public ?array $data = [];

    protected function getFormStatePath(): string
    {
        return 'data';
    }

    public function mount()
    {
        $setting = Setting::first();

        $this->form->fill([
            'site_name' => $setting->site_name ?? null,
            'logo' => $setting->logo ?? null,
            'header_script' => $setting->header_script ?? null,
           'footer_script' => $setting->footer_script ?? null,
        ]);
    }

    protected function getFormSchema(): array
    {
        return [
            TextInput::make('site_name')
                ->label('Site Name'),

            FileUpload::make('logo')
                ->image()
                ->directory('settings')
                ->disk('public')
                ->visibility('public')
                ->required(false),

                 // 🔥 NEW
        Textarea::make('header_script')
            ->label('Header Script')
            ->rows(5)
            ->placeholder('<script>...</script>')
            ->helperText('This will be added inside <head>'),

        Textarea::make('footer_script')
            ->label('Footer Script')
            ->rows(5)
            ->placeholder('<script>...</script>')
            ->helperText('This will be added before </body>'),
        ];
    }

    public function save()
    {
        $data = $this->form->getState();

        Setting::updateOrCreate(
            ['id' => 1],
            [
                'site_name' => $data['site_name'] ?? null,
                'logo' => $data['logo'] ?? null,
                'header_script' => $data['header_script'] ?? null,
                'footer_script' => $data['footer_script'] ?? null,
            ]
        );

        Notification::make()
            ->title('Settings Saved Successfully!')
            ->success()
            ->send();
    }
}