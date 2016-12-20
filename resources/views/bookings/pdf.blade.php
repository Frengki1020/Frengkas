<?php
    
    foreach ($bookings as $key => $value) {
        $no_invoices = $value->id;
        
        $no_request  = $value->id;
        $tgl_cetak   = date('d-m-Y');
        $dataUser = DB::table('users')->where('id', $value->id_users)->first();
        $namaUser = $dataUser->name;
    }
   
    foreach ($bookings as $key => $value) {
        $layanans = array();
        $dataLayanan =  explode(", ", $value->id_layanans);
        $totalData = count($dataLayanan);
        for ($i=0; $i < $totalData; $i++) { 
            if($dataLayanan[$i] != NULL){
                $layanans_1 = DB::table('layanans')->where('id', $dataLayanan[$i])->first();
                            $layanans[] = [
                                0 => $layanans_1->nama_layanans,
                                1 => $layanans_1->harga
                            ];
                        }
                    }
                }
                //echo json_encode($layanans);
                $no = 1;
                $harga = 0;
                foreach ($layanans as $key => $value) {
                    $harga += $value[1];
                }
?>   


    <!DOCTYPE html>  
     <html>  
     <head>  
     <title>Invoice</title>  
     <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/></head>
     <body>  
       
        <table class="table table-striped table-bordered" border="0.5px" width="90%" height="80%">
            <tr>
                <td width="200px" >
                    <font align="left">No.Invoice: {{ $no_invoices }}<br>
                    <font align="left">No.Request: {{ $no_request }}<br>
                    <font align="left">Tgl Cetak: {{ $tgl_cetak }}<br>
                </td>
                <td>
                    <font align="right"><center>Frengkas</center>
                    <font align="right"><center>Ketamvanan Anda Ada Ditangan Kami</center>
                </td>
            </tr>
        </table>
        <table class="good" border="1px" width="90%" height="80%">
            <tr>
                <th class="tg-3wr7">No.<br></th>
                <th class="tg-3wr7" colspan="2">Item Service<br></th>
                <th class="tg-3wr7">Price<br></th>
            </tr> 

          

            @foreach($layanans as $values)
                <tr>
                    <td>{{ $no++ }}</td>   
                    <td colspan="2">{{ $values[0] }}</td>  
                    <td>{{ $values[1] }}</td>   
                </tr>
            @endforeach   
            <tr>   
                <td colspan="3" align="center">Total</td>   
                <!-- <td></td> -->
                <td>{{ $harga }}</td>     
            </tr>
            <tr>   
                <td colspan="4" height="100pt" align="left" valign="top">FeedBack:</td>     

            </tr> 
            <tr>   
                <td >{{ $namaUser }}</td>    
                <td colspan="2" align="center">NEDStudio HQ<br>Frengkas<br>Ketampanan Anda Ditangan Kami</td>
                <td>Frengkas</td>  
            </tr>  
        </table>   
     </body>  
</html>  