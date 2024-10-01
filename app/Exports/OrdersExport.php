<?php
namespace App\Exports;

use App\Models\Order;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithDrawings;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;
use Carbon\Carbon;

class OrdersExport implements FromCollection, WithHeadings, WithMapping, WithDrawings, WithEvents
{
    protected $month;

    public function __construct($month)
    {
        $this->month = $month;
        Carbon::setLocale('id'); // Mengatur locale ke bahasa Indonesia
    }

    /**
     * Fetch data from database based on the month selected.
     */
    public function collection()
    {
        if ($this->month) {
            return Order::whereMonth('date', $this->month)->get();
        }
        return Order::all();
    }

    /**
     * Define the headings for the Excel file.
     */
    public function headings(): array
    {
        return [
            'ID',
            'Nama',
            'Telepon',
            'Email',
            'Instagram',
            'Nama Jasa',
            'Kode Unik',
            'Tanggal Pesanan',
            'Waktu',
            'Durasi (menit)',
            'Total Harga',
            'Bukti Pembayaran',
            'Status Pembayaran',
        ];
    }

    /**
     * Map each order to the corresponding row in Excel.
     */
    public function map($order): array
    {
        return [
            $order->id,
            $order->name,
            $order->phone,
            $order->email,
            $order->instagram,
            $order->nama_jasa,
            $order->unique_code,
            \Carbon\Carbon::parse($order->date)->translatedFormat('l, d F Y'), // Format tanggal dalam Bahasa Indonesia
            date('H:i', strtotime($order->time)),
            $order->durasi . ' menit', // Menambahkan "menit" di belakang durasi
            'Rp. ' . number_format($order->total_price, 0, ',', '.'),
            $order->bukti_pembayaran ? 'Ada' : 'Tidak Ada', // Gambar akan dihandle di WithDrawings
            $order->status == 'Paid' ? 'Lunas' : 'Belum Lunas',
        ];
    }
    

    /**
     * Add image for 'bukti_pembayaran' field.
     */
    public function drawings()
    {
        $drawings = [];
        
        // Loop through all orders and add drawing objects for those with a payment proof
        $orders = $this->collection();
        foreach ($orders as $index => $order) {
            if ($order->bukti_pembayaran) {
                $drawing = new Drawing();
                $drawing->setName('Bukti Pembayaran');
                $drawing->setDescription('Bukti Pembayaran');
                $drawing->setPath(public_path('storage/bukti_pembayaran/' . $order->bukti_pembayaran)); // Path to image
                
                // Set the image dimensions
                $drawing->setHeight(100); // Set fixed height
                $drawing->setWidth(100); // Set fixed width
                
                // Coordinates for the image
                $drawing->setCoordinates('L' . ($index + 2)); // Assuming headers are in row 1, so data starts in row 2
                $drawing->setOffsetX(5); // Optionally adjust the position
                $drawing->setOffsetY(5); // Optionally adjust the position
    
                $drawings[] = $drawing;
            }
        }
        
        return $drawings;
    }
    
    /**
     * Resize the row height and column width to fit the image.
     */
    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function(AfterSheet $event) {
                $worksheet = $event->sheet->getDelegate();
    
                // Set width of the column to fit the image
                $worksheet->getColumnDimension('L')->setWidth(15); // Adjust the width for the column with the image
                
                // Set height of the row to fit the image
                foreach ($this->collection() as $index => $order) {
                    if ($order->bukti_pembayaran) {
                        $worksheet->getRowDimension($index + 2)->setRowHeight(180); // Set row height to match the image height
                    }
                }
            },
        ];
    }
    
}
