$('#btnHitung').click(function (){
    // Aspek Pengetahuan
    // Total Nilai
    var rataP      = parseFloat($('#rataP').val());
    var uts  = parseFloat($('#uts').val());
    var uas    = parseFloat($('#uas').val());
    var totalNilaiP  = (rataP+uts+uas)/3;
    $('#totalNilaiP').val(Math.round(totalNilaiP)).change();

    // Rata-Rata Nilai
    var rataNilaiP   = (Math.round(totalNilaiP)/100)*4
    $('#rataNilaiP').val(rataNilaiP).change();

    // Konversi
    var predikatP = "";
    if(rataNilaiP>3.66){
        predikatP = "A";
    }else if(rataNilaiP>3.33){
        predikatP = "A-";
    }else if(rataNilaiP>3){
        predikatP = "B+";
    }else if(rataNilaiP>2.66){
        predikatP = "B";
    }else if(rataNilaiP>2.33){
        predikatP = "B-";
    }else if(rataNilaiP>2){
        predikatP = "C+";
    }else if(rataNilaiP>1.66){
        predikatP = "C";
    }else if(rataNilaiP>1.33){
        predikatP = "C-";
    }else if(rataNilaiP>1){
        predikatP = "D+";
    }else{
        predikatP = "D";
    }
    $('#konversiNilaiP').val(predikatP).change();

    // Keterangan
    var kkm = parseFloat($('#kkm').val());
    var ketP = (rataNilaiP > kkm) ? "Tuntas":"Tidak Tuntas";
    $('#ketNilaiP').val(ketP).change();


    // Aspek Keterampilan
    // Total Nilai
    var ukrata      = parseFloat($('#ukrata').val());
    var projekrata  = parseFloat($('#projekrata').val());
    var portrata    = parseFloat($('#portrata').val());
    var totalNilai  = (ukrata+projekrata+portrata)/3;
    $('#totalNilai').val(Math.round(totalNilai)).change();

    // Rata-Rata Nilai
    var rataNilai   = (Math.round(totalNilai)/100)*4
    $('#rataNilai').val(rataNilai).change();

    // Konversi
    var predikat = "";
    if(rataNilai>3.66){
        predikat = "A";
    }else if(rataNilai>3.33){
        predikat = "A-";
    }else if(rataNilai>3){
        predikat = "B+";
    }else if(rataNilai>2.66){
        predikat = "B";
    }else if(rataNilai>2.33){
        predikat = "B-";
    }else if(rataNilai>2){
        predikat = "C+";
    }else if(rataNilai>1.66){
        predikat = "C";
    }else if(rataNilai>1.33){
        predikat = "C-";
    }else if(rataNilai>1){
        predikat = "D+";
    }else{
        predikat = "D";
    }
    $('#konversiNilai').val(predikat).change();

    // Keterangan
    var kkm = parseFloat($('#kkm').val());
    var ket = (rataNilai > kkm) ? "Tuntas":"Tidak Tuntas";
    $('#ketNilai').val(ket).change();

    // Enable Simpan
    if ($('#ketNilai').val() == ""){
        document.getElementById("Simpan").disabled = true;
    }else{
        document.getElementById("Simpan").disabled = false;
    }
});