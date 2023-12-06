<?php

namespace App\Charts;

use ArielMejiaDev\LarapexCharts\LarapexChart;
use App\Models\Evento;
use Carbon\Carbon;

class QtdEventosChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\BarChart
    {
        $lastSixMonths = Carbon::now()->subMonths(6);

        $allMonths = [];
        $currentMonth = Carbon::now();

        for ($i = 0; $i < 6; $i++) {
            $allMonths[] = $currentMonth->format('F');
            $currentMonth->subMonth();
        }

        $allMonths = array_reverse($allMonths);

        $eventosPorMes = Evento::selectRaw('MONTH(data) as month, COUNT(*) as total')
            ->where('data', '>=', $lastSixMonths)
            ->groupBy('month')
            ->orderBy('month')
            ->get();

        $meses = [];
        $quantidades = [];

        foreach ($allMonths as $month) {
            $meses[] = $month;
            $quantidade = $eventosPorMes->firstWhere('month', Carbon::parse($month)->format('n'));
            $quantidades[] = $quantidade ? $quantidade->total : 0;
        }

        return $this->chart->barChart()
            ->setTitle('Quantidade de eventos nos Últimos 6 Meses')
            ->setSubtitle('Evolução mensal das vendas')
            ->addData('Quantidade de eventos', $quantidades)
            ->setXAxis($meses);
    }
}
