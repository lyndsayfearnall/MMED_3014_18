(function(){
  //this is where I tried to set the user's timezone and then got confused.
    let timezoneOffset = new Date().getTimezoneOffset(); //gives timezone difference +- UTC
        timezoneOffset = timezoneOffset == 0 ? 0 : -timezoneOffset; //add the opposite + or - sign to local timezone to match offset

    console.log(timezoneOffset);

    // function getTimezone(){
    //   const url = 'admin/admin_index.php';
    //
    //     fetch(url)
    //       .then((resp) => resp.json())
    //       .then((data) => {
})();
