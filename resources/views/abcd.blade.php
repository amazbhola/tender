$data = DB::table('tenders')
->join('methods','methods.id',"=",'tenders.method_id')
->join('districts','districts.id',"=",'tenders.location_id')
->join('departments','departments.id',"=",'tenders.department_id');




12

$data = DB::table('borrowers')
        ->join('loans', 'borrowers.id', '=', 'loans.borrower_id')
        ->select('borrowers.*', 'loans.*')
        ->where('loan_officers', 'like', '%' . $officerId . '%')
        ->where('loans.maturity_date', '<', date("Y-m-d"))
        ->get();
