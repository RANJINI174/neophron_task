<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\RedirectResponse;
use App\Models\Sports;
use App\Models\categories;
//use App\Models\customers;
//use App\Models\groups;
use Illuminate\View\View;


class compareController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $sports = Sports::with('categories')->get();
        $categories = categories::with('sports')->get();

        return view('sports.index1', compact('sports', 'categories'));
    }

    public function viewStores($categories_id)
{
    $categories = categories::findOrFail($categories_id);
    $sports = $categories->sports;

    return view('sports.index1', compact('sports','categories'));
}
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->unsignedBigInteger('group_id')->nullable();
            $table->foreign('group_id')->references('id')->on('groups');
            $table->string("mobile_no");
            $table->string("email");
            $table->string("gst_no");
            $table->string("billing_address");
            $table->string("shipping_address");
            $table->string("status");

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};
