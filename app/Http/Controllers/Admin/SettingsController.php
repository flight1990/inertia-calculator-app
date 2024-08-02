<?php

namespace App\Http\Controllers\Admin;

use App\Actions\Settings\GetSettingsAction;
use App\Actions\Settings\UpdateSettingsAction;
use App\Http\Controllers\Controller;
use App\Http\Resources\SettingResource;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class SettingsController extends Controller
{
    public function __construct(
        protected GetSettingsAction    $getSettingsAction,
        protected UpdateSettingsAction $updateSettingsAction
    )
    {
    }

    public function index(Request $request): Response
    {
        $settings = $this->getSettingsAction->run();

        return Inertia::render('Admin/Settings/Index', [
            'settings' => SettingResource::collection($settings)
        ]);
    }

    public function update(Request $request): RedirectResponse
    {
        $this->updateSettingsAction->run($request->all());
        return redirect()->back();
    }
}
