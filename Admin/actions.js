function openadd() {
    document.getElementById("form").classList.add("openaddform");
    }   
    function openupdate(){
    document.getElementById("formupdate").classList.add("openupdateform");
    }
   
    function opendelete() {
    document.getElementById("formdelete").classList.add("opendeleteform");
    }
//  Customer
    function addCustomer() {
        var form = document.getElementById("add");
        var formData = new FormData(form);
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "customer/insert.php", true);
        xhr.onreadystatechange = function() {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                if (xhr.status === 200) {
                    document.getElementById("addResult").innerHTML = xhr.responseText;
                } else {
                    document.getElementById("addResult").innerHTML = "Error occurred.";
                }
            }
        };
        xhr.send(formData);
        document.getElementById("form").classList.remove("openaddform");
       }

    function deleteCustomer() {
        var form = document.getElementById("deleteCustomerForm");
        var formData = new FormData(form);
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "customer/delete.php", true);
        xhr.onreadystatechange = function() {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                if (xhr.status === 200) {
                    document.getElementById("deleteResult").innerHTML = xhr.responseText;
                } else {
                    document.getElementById("deleteResult").innerHTML = "Error occurred.";
                }
            }
        };
        xhr.send(formData);
        document.getElementById("formdelete").classList.remove("opendeleteform");  
    }

    function updateCustomer() {
        var form = document.getElementById("updateCustomerForm");
        var formData = new FormData(form);
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "customer/update.php", true);
        xhr.onreadystatechange = function() {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                if (xhr.status === 200) {
                    document.getElementById("updateResult").innerHTML = xhr.responseText;
                } else {
                    document.getElementById("updateResult").innerHTML = "Error occurred.";
                }
            }
        };

        xhr.send(formData);
 document.getElementById("formupdate").classList.remove("openupdateform");
   
    }
// BookingPackage
    function addBookingPackage() {
        var form = document.getElementById("addBookingPackageForm");
        var formData = new FormData(form);
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "package/insert.php", true);
        xhr.onreadystatechange = function() {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                if (xhr.status === 200) {
                    document.getElementById("addResult").innerHTML = xhr.responseText;
                } else {
                    document.getElementById("addResult").innerHTML = "Error occurred.";
                }
            }
        };
        xhr.send(formData);
        document.getElementById("form").classList.remove("openaddform");
    }

    function deleteBookingPackage() {
        var form = document.getElementById("deleteBookingPackageForm");
        var formData = new FormData(form);
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "package/delete.php", true);
        xhr.onreadystatechange = function() {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                if (xhr.status === 200) {
                    document.getElementById("deleteResult").innerHTML = xhr.responseText;
                } else {
                    document.getElementById("deleteResult").innerHTML = "Error occurred.";
                }
            }
        };
        xhr.send(formData);
        document.getElementById("formdelete").classList.remove("opendeleteform");  
  
    }

    function updateBookingPackage() {
        var form = document.getElementById("updateBookingPackageForm");
        var formData = new FormData(form);
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "package/update.php", true);
        xhr.onreadystatechange = function() {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                if (xhr.status === 200) {
                    document.getElementById("updateResult").innerHTML = xhr.responseText;
                } else {
                    document.getElementById("updateResult").innerHTML = "Error occurred.";
                }
            }
        };
        xhr.send(formData);
        
 document.getElementById("formupdate").classList.remove("openupdateform");
    }
 

// hotel
function addHotel() {
    var form = document.getElementById("addHotelForm");
    var formData = new FormData(form);
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "hotel/insert.php", true);
    xhr.onreadystatechange = function() {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                document.getElementById("addResult").innerHTML = xhr.responseText;
            } else {
                document.getElementById("addResult").innerHTML = "Error occurred.";
            }
        }
    };
    xhr.send(formData);
    document.getElementById("form").classList.remove("openaddform");
  
}

function deleteHotel() {
    var form = document.getElementById("deleteHotelForm");
    var formData = new FormData(form);
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "hotel/delete.php", true);
    xhr.onreadystatechange = function() {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                document.getElementById("deleteResult").innerHTML = xhr.responseText;
            } else {
                document.getElementById("deleteResult").innerHTML = "Error occurred.";
            }
        }
    };
    xhr.send(formData);
    document.getElementById("formdelete").classList.remove("opendeleteform");  
  
}

function updateHotel() {
    var form = document.getElementById("updateHotelForm");
    var formData = new FormData(form);
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "hotel/update.php", true);
    xhr.onreadystatechange = function() {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                document.getElementById("updateResult").innerHTML = xhr.responseText;
            } else {
                document.getElementById("updateResult").innerHTML = "Error occurred.";
            }
        }
    };
    xhr.send(formData);
    document.getElementById("formupdate").classList.remove("openupdateform");
 
}

function addTransport() {
    var form = document.getElementById("addTransportForm");
    var formData = new FormData(form);
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "transport/insert.php", true);
    xhr.onreadystatechange = function() {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                document.getElementById("addResult").innerHTML = xhr.responseText;
            } else {
                document.getElementById("addResult").innerHTML = "Error occurred.";
            }
        }
    };
    xhr.send(formData);
    document.getElementById("form").classList.remove("openaddform");
  
}

function deleteTransport() {
    var form = document.getElementById("deleteTransportForm");
    var formData = new FormData(form);
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "transport/delete.php", true);
    xhr.onreadystatechange = function() {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                document.getElementById("deleteResult").innerHTML = xhr.responseText;
            } else {
                document.getElementById("deleteResult").innerHTML = "Error occurred.";
            }
        }
    };
    xhr.send(formData);
    document.getElementById("formdelete").classList.remove("opendeleteform");  
  
}

function updateTransport() {
    var form = document.getElementById("updateTransportForm");
    var formData = new FormData(form);
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "transport/update.php", true);
    xhr.onreadystatechange = function() {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                document.getElementById("updateResult").innerHTML = xhr.responseText;
            } else {
                document.getElementById("updateResult").innerHTML = "Error occurred.";
            }
        }
    };
    xhr.send(formData);
    document.getElementById("formupdate").classList.remove("openupdateform");
}