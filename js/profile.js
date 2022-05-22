// let elements = document.getElementsByClassName("remove");
(() => {
   document.getElementById("add-new-phone").addEventListener("click", function (e) {
      let count = document.getElementsByClassName("phone").length + 1;
      let html = `<div class="col-12" id="phone-${count}">
                     <label class="labels">Phone Number </label>
                     <input type="text" class="form-control phone" name="phone_number[]" placeholder="enter phone number" >
                     <span class="remove" data-key="${count}" >Remove</span>
               </div>`;
      document.getElementById("user_contacts").insertAdjacentHTML("beforeend", html);
      refreshRemovePhone();
   });

   refreshRemovePhone();

   function refreshRemovePhone() {
      let elements = document.getElementsByClassName("remove");
      Array.from(elements).forEach(function (element) {
         element.addEventListener("click", function (e) {
            document.getElementById("phone-" + this.getAttribute("data-key")).remove();
         });
      });
   }
})();
