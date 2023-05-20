// Dashboard Layout 

var toggle = document.getElementById('top-menu-toggle');

toggle.addEventListener('click', function(){

    let lables_list = document.getElementsByClassName('list-item-lable');

    for (let i = 0; i <= lables_list.length; i++) {

        if (lables_list[i].style.display != 'none') {

            lables_list[i].style.display = 'none';
            
            document.getElementById('sidebar-dropdown').style.left = "90px"
        }
        else{
            lables_list[i].style.display = 'block';
            document.getElementById('sidebar-dropdown').style.left = "230px"
            
            lables_list[i].parentNode.style.display="flex";
        }
    
    }

});

// Article form registration script

$(document).ready(function(){        
    var tagInputEle = $('#tags-input');
    tagInputEle.tagsinput();
    //tagInputEle.tagsinput('add', 'Jakarta');
    //tagInputEle.tagsinput('add', 'Bogor');
    //tagInputEle.tagsinput('add', 'Bandung');
    
});

imgInp.onchange = evt => {
    const [file] = imgInp.files
    if (file) {
        blah.src = URL.createObjectURL(file)
    }
}

ClassicEditor
    .create( document.querySelector( '#content' ) )
    .catch( error => {
        console.error( error );
    });

var new_cat = document.getElementById('category');

new_cat.addEventListener('change', function(){

    if (new_cat.value==='new') {

        document.getElementById('new-category').style.display='block';

    }else{
        document.getElementById('new-category').style.display='none';
    }
    
});

