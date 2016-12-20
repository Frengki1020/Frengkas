    <!DOCTYPE html>  
     <html>  
     <head>  
     <title>Belajar membuat tabel pada HTML</title>  
     <body>  
      <!-- <table border=1 width=100% bgcolor=yellow >   
      <caption>Tabel Latihan HTML</caption>  
      <tr align="right" height="50px" bgcolor=green>   
      <th width="300px" bgcolor=blue>Nama Kolom 1 backgroung biru</th>   
      <th>Nama Kolom 2 dengan background mengikuti atribut tr</th>   
      </tr>  -->  
        <table class="good" border="1px" width="50%">
            <tr>
                <td>
                    <font align="left">No.Invoice:<br>
                    <font align="left">No.Request:<br>
                    <font align="left">Tanggal Cetak:<br>
                </td>
                <td>
                    <font align="left"><center>Frengkas</center>
                    <font align="left"><center>Ketamvanan Anda Ditangan Kami</center>
                </td>
            </tr>
        </table>
        <table class="good" border="1px" width="50%">
            <tr>
                <th class="tg-3wr7">No<br></th>
                <th class="tg-3wr7">Item Service<br></th>
                <th class="tg-3wr7">Price<br></th>
                <th class="tg-3wr7">Amount<br></th>
            </tr> 
            <tr>
                <td>
                1.<br>2.
                </td>   
                <td>
                Botak<br>Cukur
                </td>
                <td>
                30.000<br>20.000
                </td>   
                <td>
                30.000<br>20.000
                </td>   
            </tr>   
            <tr>   
                <td colspan="2"></td>   
                
                <td>Total</td>
                <td>50.000</td>     
            </tr>
            <tr>   
                <td colspan="4">FeedBack:</td>     
            </tr> 
            <tr>   
                <td >Customer Name:</td>    
                <td colspan="2" align="center">NEDStudio HQ<br>Frengkas<br>Ketampanan Anda Ditangan Kami</td>
                <td>Frengkas</td>  
            </tr>  
        </table>   
     </body>  
</html>  