<?php

namespace App\Http\Controllers;

use App\Models\Mitra;
use Illuminate\Http\Request;

class CalonMitraController extends Controller
{
    private $phoneNumber = '6281918999460';

    public function index()
    {
        $calonMitra = Mitra::whereIn('status', ['belum diproses', 'ditolak'])->get();
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

    public function prosesMitra(Request $request, $id)
    {
        $calonMitra = Mitra::findOrFail($id);
        if ($calonMitra->status === 'terima') {
            return redirect()->route('calon-mitra.index')->with('error', 'Mitra ini sudah terdaftar.');
        }

        $calonMitra->update([
            'catatan_approver' => $request->catatan_approver,
            'status' => $request->action,
        ]);

        if ($request->whatsapp == 1) {
            $message = $this->buildWaMessage($calonMitra->nama, $request->action, $request->catatan_approver);
            $waUrl = "https://wa.me/{$this->phoneNumber}?text=" . urlencode($message);

            return view('redirect-whatsapp', [
                'waUrl' => $waUrl,
                'redirectUrl' => url('ecommerce/potential-partners'),
            ]);
        } else {
            return redirect()->route('calon-mitra.index')->with('success', "Calon Mitra {$request->action}.");
        }
    }

    public function post(Request $request)
    {
        $ktpPath = $request->file('upload_ktp')->store('ktp', 'public');
        $fotoPath = $request->file('upload_foto')->store('foto', 'public');

        $inisialKota = strtoupper(substr($request->kota_mitra, 0, 3));
        $lastMitra   = Mitra::where('kode_mitra', 'LIKE', "{$inisialKota}%")->orderBy('id', 'desc')->first();
        $nextNumber  = $lastMitra ? (int) substr($lastMitra->kode_mitra, 3) + 1 : 1;
        $kodeMitra   = sprintf("%s%03d", $inisialKota, $nextNumber);

        $data = [
            'nama' => $request->nama,
            'no_ktp' => $request->no_ktp,
            'tanggal_lahir' => $request->tgl_lahir,
            'email' => $request->email,
            'no_hp' => $request->no_hp,
            'jenis_kelamin' => $request->jenis_kelamin,
            'alamat' => $request->alamat,
            'alamat_ktp' => $request->alamat_ktp,
            'domisili' => $request->domisili,
            'provinsi' => $request->provinsi,
            'kota' => $request->kota,
            'kecamatan' => $request->kecamatan,
            'kelurahan' => $request->kelurahan,
            'provinsi_mitra' => $request->provinsi_mitra,
            'kota_mitra' => $request->kota_mitra,
            'kecamatan_mitra' => $request->kecamatan_mitra,
            'kelurahan_mitra' => $request->kelurahan_mitra,
            'kode_pos' => $request->kode_pos,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
            'upload_ktp' => $ktpPath,
            'upload_foto' => $fotoPath,
            'kode_mitra' => $kodeMitra,
        ];

        Mitra::create($data);

        return view('post-mitra');
    }

    public function petaMitra()
    {
        // Ambil data calon mitra dengan status "diterima"
        $calonMitra = Mitra::where('status', 'diterima')->get();

        return view('map-google-maps', compact('calonMitra'));
    }

    private function buildWaMessage($calonMitra, $status, $catatan)
    {
        if ($status == 'diterima') {
            $message = <<<TEXT
                *===============*
                *HUBUNGI KAMI*
                *===============*

                Subjek: Konfirmasi Penerimaan Sebagai Mitra Gerobak Listrik Angkringan

                Pesan:
                Kepada Yth.
                Bapak/Ibu {$calonMitra}

                Dengan hormat,
                Kami dengan senang hati menginformasikan bahwa pendaftaran Anda telah berhasil kami terima dan Anda resmi menjadi mitra *Gerobak Listrik Angkringan*.

                Kami sangat menghargai komitmen dan minat Anda untuk bergabung bersama kami. Kami percaya bahwa kerjasama ini akan memberikan kontribusi positif yang saling menguntungkan. Jika ada pertanyaan atau kebutuhan lebih lanjut, jangan ragu untuk menghubungi kami.

                Selamat bergabung dan mari mulai perjalanan sukses bersama!

                Hormat kami,
                *Gerobak Listrik Angkringan*
            TEXT;
        } else {
            $message = <<<TEXT
                *===============*
                *HUBUNGI KAMI*
                *===============*

                Subjek: Konfirmasi Penerimaan Sebagai Mitra Gerobak Listrik Angkringan

                Pesan:
                Kepada Yth.
                Bapak/Ibu {$calonMitra}

                Terima kasih atas minat dan perhatian yang telah Anda berikan kepada Gerobak Listrik Angkringan. Setelah melalui proses evaluasi, kami sangat menyesal untuk memberitahukan bahwa pendaftaran Anda untuk menjadi mitra kami belum dapat kami terima pada saat ini.

                Alasan penolakan kami adalah sebagai berikut:
                {$catatan}

                Kami menghargai minat Anda untuk bergabung dengan kami dan berharap dapat bekerjasama di kesempatan yang akan datang. Anda dapat mengajukan ulang pendaftaran setelah melakukan revisi atau pembaruan sesuai dengan alasan penolakan yang kami sampaikan. Kami akan mempertimbangkan kembali pendaftaran Anda setelah perbaikan dilakukan.

                Jika ada pertanyaan atau kebutuhan lebih lanjut, jangan ragu untuk menghubungi kami.

                Terima kasih atas pengertian Anda,
                *Gerobak Listrik Angkringan*
            TEXT;
        }

        return $message;
    }
}
