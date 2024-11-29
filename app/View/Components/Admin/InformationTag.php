<?php

namespace App\View\Components\Admin;

use Illuminate\View\Component;

class InformationTag extends Component
{
    public $information;

    public function __construct($information)
    {
        $this->information = $this->formatInformation($information);
    }

    public function render()
    {
        return view('components.admin.information-tag');
    }

    public function getColorClass()
    {
        $colorMap = [
            'Belum Terlaksana' => 'text-blue-500 bg-blue-100',
            'Terlaksana' => 'text-green-600 bg-green-100',
            'Tidak Terlaksana' => 'text-red-500 bg-red-100',
        ];

        return $colorMap[$this->information] ?? 'text-gray-600 ';
    }

    private function formatInformation($information)
    {
        $formattedMap = [
            'belum_terlaksana' => 'Belum Terlaksana',
            'terlaksana' => 'Terlaksana',
            'tidak_terlaksana' => 'Tidak Terlaksana',
        ];

        return $formattedMap[$information] ?? ucfirst(str_replace('_', ' ', $information));
    }
}

