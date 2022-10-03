// let qunatity=document.querySelectorAll(".qunatity1");
let button=document.getElementById("button").value;
qunatity.addEventListener("click", function (e) {
    e.preventDefault();
  
  
  fetch("http://localhost/E_Commerce/views/cart.php", {
    method: "POST",
    headers: {
        'Content-Type': 'application/x-www-form-urlencoded', 

    },
    body: `buttonclick=${button}`,
  })
    .then((waad) => waad.text())
    .then((res) => {console.log(res);
    
    });
});

// console.log("test test");




document.querySelectorAll('.breakdown').forEach(function(item) {
  item.addEventListener('blur', function(e) {
 
    // let   qun=qunatity.value;

    
    let arr=(e.target.id).split("/");console.log(arr);
    let cart_id=arr[1];
    let price=arr[2];

    let qun=e.target.value;
    // document.getElementById("subTotal").innerHTML=`${price*qun} JD`;
      fetch("http://localhost/E_Commerce/views/cart.php", {
        method: "POST",
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded', 
    
        },
        body: `qunatity_by_js=${qun}&cart_id=${cart_id}`,
      })
        .then((waad) => waad.text())
        .then((res) => {
          // console.log(res);
        
        });

  });
   });


   document.querySelectorAll('.breakd').forEach(function(item) {
    item.addEventListener('blur', function(e) {
   
      // let   qun=qunatity.value;
  
      
      // let arr=(e.target.id).split("/");console.log(arr);
      // let cart_id=arr[1];
      // let price=arr[2];

      let qun=e.target.value;
      console.log(qun)
      // document.getElementById("subTotal").innerHTML=`${price*qun} JD`;
        fetch("http://localhost/E_Commerce/views/cart.php", {
          method: "POST",
          headers: {
              'Content-Type': 'application/x-www-form-urlencoded', 
      
          },
          body: `qunatity_by_js=${qun}`,
        })
          .then((waad) => waad.text())
          .then((res) => {
            // console.log(res);
          
          });
  
    });
     });

//    document.addEventListener("blur",function(e){
//  console.log(e.target);
//    })


