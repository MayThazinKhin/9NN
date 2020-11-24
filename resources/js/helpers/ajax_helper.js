export const ajaxHelper =  {
    ajaxHeaders: function(){
        return $.ajaxSetup({
            headers: {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
            }
        });
    }
}
