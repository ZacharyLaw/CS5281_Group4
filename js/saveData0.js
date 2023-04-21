function saveData0(data) {
    $.ajax({url:'saveData.php',data:{'data':JSON.stringify(data,null,"\t")},type:'POST'});
  }