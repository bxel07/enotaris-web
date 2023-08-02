<?php /** @noinspection ALL */

namespace App\Http\Controllers;

use App\Models\pengajuan;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class SuperadminController extends Controller
{
    public function index(Request $request): View|\Illuminate\Foundation\Application|Factory|Application
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

            return view('superadmin/index', compact('datacustomer', 'result'));
        } else {
            return view('superadmin/index', compact('posts', 'result'));
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
            return view('superadmin.generate', compact('datacustomer'));
        } else {
            // If no search, fetch all data to display
            $posts = pengajuan::latest()->paginate(5);
            return view('superadmin.generate', compact('posts'));
        }

    }
    public function log() {
        return \view('superadmin.log');
    }

    public function files() {
        return \view('superadmin.folder');
    }
}
