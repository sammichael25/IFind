$('#imageInput').change(function(){
    var frm = new FormData();
    frm.append('imageInput', input.files[0]);
    $.ajax({
        method: 'POST',
        address: 'url/to/save/image',
        data: frm,
        contentType: false,
        processData: false,
        cache: false
    });
});

file, header, er := this.GetFile("imageInput")
if file != nil {
    // some helpers 
    // get the extension of the file  (import "path/filepath" for this)
    extension := filepath.Ext(header.Filename)
    // full filename
    fileName := header.Filename
    // save to server`enter code here`
    err := this.SaveToFile("imageInput", somePathOnServer)
}