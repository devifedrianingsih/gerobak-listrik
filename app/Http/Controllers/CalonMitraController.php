<?php

namespace App\Http\Controllers;

use App\Models\Mitra;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CalonMitraController extends Controller
{
    public function index()
    {
        $calonMitra = Mitra::whereIn('status', ['belum diproses', 'ditolak'])
                           ->orderBy('created_at', 'desc')
                           ->paginate(10);

        $fields = [
            'kode_mitra' => 'Kode Mitra',
            'nama' => 'Nama Lengkap',
            'no_ktp' => 'No KTP',
            'tanggal_lahir' => 'Tanggal Lahir',
            'email' => 'Email',
            'no_hp' => 'No HP',
            'jenis_kelamin' => 'Jenis Kelamin',
            'alamat' => 'Alamat',
            'alamat_ktp' => 'Alamat KTP',
            'domisili' => 'Domisili',
            'provinsi' => 'Provinsi',
            'kota' => 'Kota',
            'kecamatan' => 'Kecamatan',
            'kelurahan' => 'Kelurahan',
            'provinsi_mitra' => 'Provinsi Mitra',
            'kota_mitra' => 'Kota Mitra',
            'kecamatan_mitra' => 'Kecamatan Mitra',
            'kelurahan_mitra' => 'Kelurahan Mitra',
            'kode_pos' => 'Kode Pos',
            'latitude' => 'Latitude',
            'longitude' => 'Longitude',
        ];

        return view('ecommerce-potential-partners', compact('calonMitra', 'fields'));
    }

    public function post(Request $request)
    {
        $ktpPath = $request->file('upload_ktp')->store('ktp', 'public');
        $fotoPath = $request->file('upload_foto')->store('foto', 'public');
        
        $data = [
            'nama' => Str::title($request->nama),
            'no_ktp' => $request->no_ktp,
            'tanggal_lahir' => $request->tgl_lahir,
            'email' => strtolower($request->email),
            'no_hp' => $request->no_hp,
            'jenis_kelamin' => $request->jenis_kelamin,
            'alamat' => Str::title($request->alamat),
            'alamat_ktp' => Str::title($request->alamat_ktp),
            'domisili' => Str::title($request->domisili),
            'provinsi' => Str::title($request->provinsi),
            'kota' => Str::title($request->kota),
            'kecamatan' => Str::title($request->kecamatan),
            'kelurahan' => Str::title($request->kelurahan),
            'provinsi_mitra' => Str::title($request->provinsi_mitra),
            'kota_mitra' => Str::title($request->kota_mitra),
            'kecamatan_mitra' => Str::title($request->kecamatan_mitra),
            'kelurahan_mitra' => Str::title($request->kelurahan_mitra),
            'kode_pos' => $request->kode_pos,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
            'upload_ktp' => $ktpPath,
            'upload_foto' => $fotoPath,
            'kode_mitra' => null,
        ];

        Mitra::create($data);

        return view('post-mitra');
    }

    public function prosesMitra(Request $request, $id)
    {
        $calonMitra = Mitra::findOrFail($id);

        if ($calonMitra->status === 'terima') {
            return redirect()->route('calon-mitra.index')->with('error', 'Mitra ini sudah terdaftar.');
        }

        $updateData = [
            'catatan_approver' => $request->catatan,
            'status' => $request->action,
        ];

        if ($request->action === 'diterima' && !$calonMitra->kode_mitra) {
            $kodePrefix = $this->generateKodePrefix($calonMitra->kota_mitra);

            $lastKode = Mitra::where('kode_mitra', 'LIKE', "{$kodePrefix}%")
                            ->orderBy('id', 'desc')
                            ->value('kode_mitra');

            $nextNumber = $lastKode ? (int) substr($lastKode, strlen($kodePrefix)) + 1 : 1;
            $kodeBaru = sprintf('%s%03d', $kodePrefix, $nextNumber);
            $updateData['kode_mitra'] = strtoupper($kodeBaru);
        }

        $calonMitra->update($updateData);

        if ($request->whatsapp == 1) {
            $message = $this->buildWaMessage($calonMitra->nama, $request->action, $request->catatan);

            // Ubah nomor HP ke format internasional (62)
            $targetNumber = preg_replace('/[^0-9]/', '', $calonMitra->no_hp);
            $targetNumber = ltrim($targetNumber, '0');
            if (!str_starts_with($targetNumber, '62')) {
                $targetNumber = '62' . $targetNumber;
            }

            $waUrl = "https://wa.me/{$targetNumber}?text=" . urlencode($message);

            return view('redirect-whatsapp', [
                'waUrl' => $waUrl,
                'redirectUrl' => url('ecommerce/potential-partners'),
            ]);
        }

        return redirect()->route('calon-mitra.index')->with('success', "Calon Mitra {$request->action}.");
    }

    public function petaMitra()
    {
        $calonMitra = Mitra::where('status', 'diterima')->get();

        return view('map-google-maps', compact('calonMitra'));
    }

    private function buildWaMessage($calonMitra, $status, $catatan)
    {
        if ($status == 'diterima') {
            $message = <<<TEXT
            Subjek: Penerimaan Mitra Gerobak Listrik Angkringan

            Kepada Yth.
            Bapak/Ibu *{$calonMitra}*

            Dengan hormat,
            Kami dengan senang hati menginformasikan bahwa Anda resmi menjadi *Mitra Gerobak Listrik Angkringan*.

            Terima kasih atas kepercayaan dan komitmen Anda. Jika ada pertanyaan lebih lanjut, jangan ragu untuk menghubungi kami.

            Selamat bergabung!
            Gerobak Listrik Angkringan
            TEXT;
                    } else {
                        $message = <<<TEXT
            Subjek: Evaluasi Pendaftaran Mitra

            Kepada Yth.
            Bapak/Ibu *{$calonMitra}*

            Terima kasih atas minat Anda pada Gerobak Listrik Angkringan.
            Setelah evaluasi, kami informasikan bahwa pendaftaran Anda belum dapat kami terima saat ini.

            Alasan: 
            *{$catatan}*

            Silakan ajukan ulang setelah revisi sesuai alasan di atas.
            Jika ada pertanyaan, hubungi kami kapan saja.

            Terima kasih atas pengertian Anda.
            Gerobak Listrik Angkringan
            TEXT;
        }

        return $message;
    }

    private function generateKodePrefix($namaKota)
    {
        $namaKota = Str::of($namaKota)->replace(['Kota ', 'Kabupaten '], '')->title();
        $kata = explode(' ', $namaKota);
        $kode = '';

        foreach (array_slice($kata, 0, 2) as $k) {
            $kode .= strtoupper(substr($k, 0, 3));
        }

        return $kode;
    }
}
