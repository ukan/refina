@section('scripts')

    <script>
    $(document).ready(function() {
        
        tinymce.init({
					selector: "textarea[class*=basic_tinymce_editor],textarea[id*=basic_tinymce_editor]",
					height : 500,
				    plugins: [
				        "advlist autolink lists link image charmap print preview anchor",
				        "searchreplace visualblocks code fullscreen",
				        "insertdatetime media table contextmenu paste"
				    ],
					convert_urls: false,forced_root_block : false,
				    toolbar_items_size: 'small', entity_encoding: 'raw',   
				    toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
					
				});

				function myCustomOnChangeHandler(inst) {
				        alert("Some one modified something");
				        alert("The HTML is now:" + inst.getBody().innerHTML);
				}

    });
    
    </script>
@endsection