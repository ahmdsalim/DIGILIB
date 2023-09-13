<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" class="width=device-width, initial-scale=1.0">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<title>Baca Buku</title>
	@vite(['resources/assets/css/bootstrap.min.75a07e3a3100a6fed983b15ad1b297c127a8c2335854b0efc3363731475cbed6.css','resources/assets/css/nifty.min.4d1ebee0c2ac4ed3c2df72b5178fb60181cfff43375388fee0f4af67ecf44050.css'])
</head>
<script src="{{asset('assets/js/lib/webviewer.min.js')}}"></script>
<body>
	<div id='viewer' style="width:100vw;height:100vh;margin:0 auto;"></div>
	@vite('resources/js/app.js')
	<script>
	var isError = false
	var errMsg
	var latestPage = @json($latestPage);
	const session = @json($sesi);
	const newReader = @json($newReader);
	const book_id = @json(Crypt::encryptString($buku->id)); 
	  WebViewer({
	    path: '{{asset("assets/js/lib")}}', // path to the PDF.js Express'lib' folder on your server
	    licenseKey: 'Zmb9M9JNJJDw9Oi2jJy9',
	    initialDoc: "{{ Storage::url('files/'.$buku->url_pdf) }}",
	    disabledElements: [
	    	'leftPanelButton',
		    'viewControlsButton',
		    'viewControlsOverlay',
		    'panToolButton',
		    'selectToolButton',
		    'downloadButton'
		 ],
	    // initialDoc: '/path/to/my/file.pdf',  // You can also use documents on your server
	  }, document.getElementById('viewer'))
	  .then(instance => {
	    // now you can access APIs through the WebViewer instance
	    const { Core, UI, docViewer } = instance;
	    
	    const panTool = Core.Tools.ToolNames.PAN;

	    UI.iframeWindow.addEventListener('loaderror', (err) => {
	      // Do something with error. eg. instance.showErrorMessage('An error has occurred')
	      isError = true
	      errMsg = err 
	    });

	    UI.setToolMode(panTool);
	    // adding an event listener for when a document is loaded
	    // instance.setLayoutMode(instance.LayoutMode.Single);
	    UI.setHeaderItems(header => {
	    	header.delete(1)
	    	header.push({
	    		type: 'customElement',
	    		render: () => {
	    			const button = document.createElement('button')
	    			button.innerHTML = 'Simpan'
	    			button.setAttribute('id', 'savebutton')
	    			button.style.color = '#485056'
	    			button.style.backgroundColor = '#dde6ee'
	    			button.style.border = 'none'
	    			button.style.padding = '7px 15px'
	    			button.style.fontWeight = 'bold'
	    			button.style.cursor = 'pointer'
	    			button.style.borderRadius = '3px'
	    			button.onclick = () => {
	    				save_read(true)
	    			}
	    			return button
	    		}
	    	})
	    })

	    Core.documentViewer.addEventListener('documentLoaded', () => {
	      docViewer.setCurrentPage(latestPage)
	      if(newReader){
	      	save_read()
	      }
	    });

	    // adding an event listener for when the page number has changed
	    Core.documentViewer.addEventListener('pageNumberUpdated', (pageNumber) => {
	    	if(pageNumber > latestPage){
	    		latestPage = pageNumber
	    		save_read()
	    	}
	    });
	  });

	 let savetimer
	 function save_read(showToast = false) {
	 	if(!isError){
		 	var csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
		 	clearTimeout(savetimer)
		 	savetimer = setTimeout(() => {
			 	axios.post('{{route("api.read.save")}}', {
			 		sesi: session,
			 		buku_id: book_id,
			 		progress: latestPage
			 	}, {
			 		headers: {
			 			'X-CSRF-TOKEN': csrfToken
			 		}
			 	})
			 	.then((response) => {
			 		console.log(response)
			 		if (showToast) {
			 			showSuccessToast('Tersimpan',"{{asset('assets/img/icon/success.svg')}}")
			 		}
			 	})
			 	.catch((error) => {
			 		console.error(error)
			 	})
		 	}, 1000)
		}
	 }
	</script>
</body>
</html>