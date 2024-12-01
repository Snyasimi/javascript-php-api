
//const response = await fetch("http://localhost:80/php-api/");
//types
/* 
interface Creds {
   Email:string,
   Password:string 
}

const data:Creds={
  "Email":"nyasimisolo@gmail.com",
  "Password" : "123456"
} 

const response = await fetch("http://localhost:80/php-api/login.php", {
  method:"POST",
  headers:{
    'Content-Type':'application/json'
  },
  body:JSON.stringify(data)
}
);

if(response.ok){

  const content = await response.json();
  //console.log(`Message:${content}`);

  console.log(`Message:${content.message}\nEmail:${data['Email']}\nPassword: ${data['Password']}\n`);

}else{
  console.log(`Response not ok\nError code:${response.status}`);
}

*/ 

async function getData(url:string){

  if(url.trim() == ""){
    console.log("Please provide a url");
  }

  const headers = {
    "Content-Type": "application/json",
  }
  const response = await fetch(url,{
    method:"GET",
    headers:headers
  }); 
  console.log(response);

  if(response.ok){
    const data = await response.text();
    console.log(`Message: ${data}`);
  }

}

getData("http://localhost:80/php-api/login.php");

/*

if(!response.ok){
  console.log("Error fetching the request\n");
}

const resBody = await response.json();

console.log(`Body: ${resBody.leg} Response code:${response.status}\n`);


//REQUEST POST

const credentials:Creds = {
  email: "nyasimisolo@gmail.com",
  password: "12345"
};


const req = await fetch("http://localhost:80/php-api/",{
  method: "POST",
  headers:{
    'Content-Type':'application/json'
  },
  body:JSON.stringify(credentials)
});

if(req.ok){
   const req_body = await req.json();

   console.log(`Email: ${req_body.email}\nPassword: ${req_body.password}`);
}

*/