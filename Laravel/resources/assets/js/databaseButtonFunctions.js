function storeNumbers()
{


        $storeNumbers = DB::table('stores')->pluck('storeNumber');

        foreach ($storeNumbers as $storeNumber)
        {
            $search_output .= '</br>';
            $search_output .= $storeNumber;
        }

}
