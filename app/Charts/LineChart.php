<?php

namespace App\Charts;

use App\Models\Pemasukan;
use App\Models\Pembayaran;
use App\Models\Pengeluaran;
use ArielMejiaDev\LarapexCharts\LarapexChart;
use Carbon\Carbon;

class LineChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\LineChart
    {
        $pemasukan = Pemasukan::all(['*']);
        $pembayaran = Pembayaran::where('status', 'valid')
            ->select('created_at', 'total_bayar as jumlah')
            ->get();
        $rekap = $pembayaran->concat($pemasukan);

        // For looping
        $tahun = date('Y');
        $bulan = date('m');
        $dataBulan = [];
        $dataTotalPemasukan = [];
        $dataTotalPengeluaran = [];

        for ($i = 1; $i <= $bulan; $i++) {
            $totalPemasukan = $rekap->filter(function ($item) use ($tahun, $i) {
                return $item->created_at->year == $tahun && $item->created_at->month == $i;
            })->sum('jumlah');

            $totalPengeluaran = Pengeluaran::whereYear('tanggal', $tahun)
                ->whereMonth('tanggal', $i)
                ->sum('jumlah');

            $dataBulan[] = Carbon::create()->month($i)->format('F');
            $dataTotalPemasukan[] = $totalPemasukan;
            $dataTotalPengeluaran[] = $totalPengeluaran;
        }

        // dd($dataBulan);

        return $this->chart->lineChart()
            ->setTitle('Cashflow Villa Gading')
            ->setSubtitle('Pemasukan & Pengeluaran.')
            ->addData('Total Pemasukan', $dataTotalPemasukan)
            ->addData('Total Pengeluaran', $dataTotalPengeluaran)
            ->setXAxis($dataBulan)
            ->setGrid();
    }
}
