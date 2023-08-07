<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use App\Models\pengajuan;


class PegawaiController extends Controller
{
    /**
     * @param Request $request
     * @return Application|Factory|View|\Illuminate\Foundation\Application
     */
    public function index(Request $request)
    {
        $customer_id = $request->input('customer_id');

        // If no search, fetch all data to display
        $posts = pengajuan::latest()->paginate(5);

        $ktp = pengajuan::count('ktp');
        $npwp = pengajuan::count('npwp');
        $sertifikat = pengajuan::count('sertifikattanah');

        $result = [
            'valid' => 0,
            'inprogress' => 0,
            'jumlah' => $ktp + $npwp + $sertifikat
        ];
        foreach ($posts as $post) {

            // Count occurrences of status
            if ($post->status === 'valid') {
                $result['valid']++;
            } elseif ($post->status === 'inprogress') {
                $result['inprogress']++;
            }
        }

        if ($customer_id) {
            // If a search is performed, get the search results
            $datacustomer = pengajuan::where('id_customer', 'like', '%' . $customer_id . '%')->get();

            return view('admin.index', compact('datacustomer', 'result'));
        } else {
            return view('admin.index', compact('posts', 'result'));
        }
    }

    /**
     * @param Request $request
     * @return View|\Illuminate\Foundation\Application|Factory|Application
     */
    public function generateshow( Request $request ): View|\Illuminate\Foundation\Application|Factory|Application
    {

        $customer_id = $request->input('customer_id');

        if ($customer_id) {
            // If a search is performed, get the search results
            $datacustomer = pengajuan::where('id_customer', 'like', '%' . $customer_id . '%')->get();
            return view('admin.generate', compact('datacustomer'));
        } else {
            // If no search, fetch all data to display
            $posts = pengajuan::latest()->paginate(5);
            return view('admin.generate', compact('posts'));
        }

    }
    public function log() {
        return \view('admin.log');
    }
    public function files() {
        return \view('admin.folder');
    }
}
