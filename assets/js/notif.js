function _(id){
	return document.getElementById(id);
}
if ((_("banyakpending")) && (_("yangpending"))){
	ambilnotif();
}
window.onload=setInterval(ambilnotif, 1000);
function ambilnotif(){
	var ajax= new XMLHttpRequest();
	var url ="http://localhost/si_aset/index.php/ambilnotif";
	ajax.onreadystatechange = function() {
    if (ajax.readyState == 4 && ajax.status == 200) {
      console.log(typeof(ajax.response));
      a = ajax.response;
      b = JSON.parse(a);
      usulan = b.usulan;
      //peminjaman = b.peminjaman;
      
      nusulan = usulan.length;
      //npeminjaman = peminjaman.length;
      
		
      var ul_isi= document.getElementById('yangpending');

	while (ul_isi.firstChild) {
	    ul_isi.removeChild(ul_isi.firstChild);
	}
	count =0 ;

      for (i=0; i<nusulan; i++)
      {
      	count1=0;
      	while(count1<nusulan){
      		
      		count1++;
      	}
      		
      	li = document.createElement('li');
      	a = document.createElement('a');
      	a.href='http://localhost/si_aset/index.php/persetujuan/lihat_persetujuan/';
      	a.innerHTML='<i class="fa fa-users text-yellow"></i> Usulan - '+usulan[i].id_user+' - '+usulan[i].nama_barang;
      	li.appendChild(a);
      	ul_isi.appendChild(li);
      
      }
      count=count+count1;
      /*for (i=0; i<npeminjaman; i++)
      {
      	count2=0;
      	while(count2<npeminjaman){
      		
      		count2++;
      	}
      		
      	li = document.createElement('li');
      	a = document.createElement('a');
      	a.href='http://localhost/si_aset/index.php/persetujuan/lihat_persetujuan/';
      	a.innerHTML='<i class="fa fa-users text-yellow"></i> Peminjaman - '+peminjaman[i].id_pinjam+' - '+peminjaman[i].id_user;
      	li.appendChild(a);
      	ul_isi.appendChild(li);
      
      
      
      
  }
  count=count+count2;*/
  span = document.getElementById('banyakpending').innerHTML=count;
      console.log(b);
    }
  };
	//ajax.addEventListener("load", completeambilnotif, false);
	ajax.open("GET", url, true);
	ajax.send();
}