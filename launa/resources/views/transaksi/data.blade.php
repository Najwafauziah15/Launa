function tambahBarang(a){
    let d = $(a).closest('tr');
    let kodeBarang = d.find('td:eq(1)').text();
    let namaBarang = d.find('td:eq(2)').text();
    let hargaBarang = d.find('td:eq(3)').text();
    let id = $(a).data('idBarang');
    let data = '';
    let tbody = $('#tblTransaksi tbody tr td').text();
    data +='<tr>';
    data +='<td>'+kodeBarang+'</td>';
    data +='<td>'+namaBarang+'</td>';
    data +='<td>'+hargaBarang+'</td>';
    data +='<input type="text" name="barang_id[]" value="'+idBarang+'">'
    data +='<input type="hidden" name="harga_beli[]" value="'+hargaBarang+'">'
    data +='<input type="hidden" name="sub_total[]" value="'+hargaBarang*parseInt($('#qty_barang').val())+'">'
    data +='<td><input type="number" value="1" min="1" name="jumlah[]" class="qty"></td>';
    // data +='<td><span class="subTotal">'+hargaBarang+'</span></td>';
    data +='<input type="text" readonly name="sub_total" class="subTotal" value="'+hargaBarang+'">'
    data +='<td><button type="button" class="btnRemoveBarang btn btn-danger" >hapus</button></td>';
    data +='</tr>'
    
    if(tbody == 'Belum ada data') $('#tblTransaksi tbody tr').remove();

    $('#tblTransaksi tbody').append(data);
    totalHarga += parseFloat(hargaBarang);
    $('#totalHarga').val(totalHarga);
    $('#tblBarangModal').modal('hide');
}