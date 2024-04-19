<?php

namespace App\Http\Controllers;
use App\DataTables\IHPerItemDataTable;
use App\Models\Inventory;
use App\Models\Deployment;
use App\Models\User;
use App\Models\Equipment;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index(IHPerItemDataTable $DataTable)
    {
        $listOfDeployment = Deployment::getAllDeployment();
        $totalCountItem = Inventory::count();
        $totalUser = User::count();
        $totalCountEquipment = Equipment::count();
        $totalCountBorrowed = Deployment::where('status', 'borrowed')->count();
        $totalCountReturn = Deployment::where('status', 'returned')->count();
        $equipTypes = Inventory::getEquipmentTypesWithCounts();

        $chartData = [
            'borrowed' => $totalCountBorrowed,
            'returned' => $totalCountReturn,
            'totalDeployments' => count($listOfDeployment) 
        ];

        $equipData = [
            'equipType' => $totalCountEquipment,
            'countEquipment' => $totalCountItem
        ];
    
        return $DataTable->render('home', compact(
            'totalCountItem',
            'totalCountEquipment',
            'listOfDeployment',
            'totalUser',
            'totalCountReturn',
            'totalCountBorrowed',
            'chartData',
            'equipData',
            'equipTypes'
        ));
    }

    public function getEquipmentCount(Request $request)
    {
        $startDate = $request->input('startDate');
        $endDate = $request->input('endDate');

        $query = Inventory::query();

        if ($startDate && $endDate) {
            $query->whereBetween('created_at', [$startDate, $endDate]);
        }

        $count = $query->count();

        return response()->json([
            'count' => $count
        ]);
    }

    public function getBorrowedCount(Request $request)
    {
        $startDate = $request->input('startDate');
        $endDate = $request->input('endDate');
        $query = Deployment::where('status', 'borrowed');
        
        if ($startDate && $endDate) {
            $query->whereBetween('created_at', [$startDate, $endDate]);
        }

        $count = $query->count();

        return response()->json(['count' => $count]);
    }

    public function getReturnedCount(Request $request)
    {
        $startDate = $request->input('startDate');
        $endDate = $request->input('endDate');
        $query = Deployment::where('status', 'returned');
        
        if ($startDate && $endDate) {
            $query->whereBetween('created_at', [$startDate, $endDate]);
        }

        $count = $query->count();

        return response()->json(['count' => $count]);
    }

    public function getUserCount(Request $request)
    {
        $startDate = $request->input('startDate');
        $endDate = $request->input('endDate');
        $query = User::query();
        
        if ($startDate && $endDate) {
            $query->whereBetween('created_at', [$startDate, $endDate]);
        }

        $count = $query->count();

        return response()->json(['count' => $count]);
    }
}
