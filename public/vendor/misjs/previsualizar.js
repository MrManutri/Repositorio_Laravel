document.querySelector('#pdffile').addEventListener('change',()=>{

    let pdfFile = document.querySelector('#pdffile').files[0];
    let pdfFileURL = URL.createObjectURL(pdfFile);
    document.querySelector('#vistaPrevia').setAttribute('src', pdfFileURL);
    
})