function imagepreview(input) {
    if(input.files && input.files[0]) {
        const imagereader = new FileReader()
        imagereader.onload = e => {
            const previewImage = document.getElementById("image-preview")
            previewImage.src = e.target.result
        }
        imagereader.readAsDataURL(input.files[0])
    }
}
const inputPreviewImage = document.getElementById("imgFile")
inputPreviewImage.addEventListener("change", e => {
    imagepreview(e.target)
}) 