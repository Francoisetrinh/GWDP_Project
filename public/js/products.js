let elementSearch = document.getElementById('searchFinder');
elementSearch.addEventListener('input', (e)=>{
    if(e.currentTarget.value==''){
        document.getElementById('search').innerHTML=''
        return
    }
    $.ajax({
        type: 'post',
        url: 'index.php?action=search_products',
        data: {
            search:'%'+ e.currentTarget.value + '%'
        },
        success: function (response) {
            let elementResult = document.getElementById('search');
            elementResult.innerHTML=''
            response.forEach(data => {
                let elementA=document.createElement('a')
                elementA.innerText=data.title
                elementA.href='index.php?action=product_description&id='+data.id
                elementResult.appendChild(elementA)
            });
        }
    });
})

