 <script>
	// This sample still does not showcase all CKEditor&nbsp;5 features (!)
		// Visit https://ckeditor.com/docs/ckeditor5/latest/description/index.html to browse all the features.
	   CKEDITOR.ClassicEditor.create(document.getElementById("description"), {
			// https://ckeditor.com/docs/ckeditor5/latest/features/toolbar/toolbar.html#extended-toolbar-configuration-format
			toolbar: {
				items: [
					'exportPDF','exportWord', '|',
					'findAndReplace', 'selectAll', '|',
					'heading', '|',
					'bold', 'italic', 'strikethrough', 'underline', 'code', 'subscript', 'superscript', 'removeFormat', '|',
					'bulletedList', 'numberedList', 'todoList', '|',
					'outdent', 'indent', '|',
					'undo', 'redo',
					'-',
					'fontSize', 'fontFamily', 'fontColor', 'fontBackgroundColor', 'highlight', '|',
					'alignment', '|',
					'link', 'uploadImage', 'blockQuote', 'insertTable', 'mediaEmbed', 'codeBlock', 'htmlEmbed', '|',
					'specialCharacters', 'horizontalLine', 'pageBreak', '|',
					'textPartLanguage', '|',
					'sourceEditing'
				],
				shouldNotGroupWhenFull: true
			},
			// Changing the language of the interface requires loading the language file using the <script> tag.
			// language: 'es',
			list: {
				properties: {
					styles: true,
					startIndex: true,
					reversed: true
				}
			},
			// https://ckeditor.com/docs/ckeditor5/latest/features/headings.html#configuration
			heading: {
				options: [
					{ model: 'paragraph', title: 'Paragraph', class: 'ck-heading_paragraph' },
					{ model: 'heading1', view: 'h1', title: 'Heading 1', class: 'ck-heading_heading1' },
					{ model: 'heading2', view: 'h2', title: 'Heading 2', class: 'ck-heading_heading2' },
					{ model: 'heading3', view: 'h3', title: 'Heading 3', class: 'ck-heading_heading3' },
					{ model: 'heading4', view: 'h4', title: 'Heading 4', class: 'ck-heading_heading4' },
					{ model: 'heading5', view: 'h5', title: 'Heading 5', class: 'ck-heading_heading5' },
					{ model: 'heading6', view: 'h6', title: 'Heading 6', class: 'ck-heading_heading6' }
				]
			},
			// https://ckeditor.com/docs/ckeditor5/latest/features/editor-placeholder.html#using-the-editor-configuration
			placeholder: '',
			// https://ckeditor.com/docs/ckeditor5/latest/features/font.html#configuring-the-font-family-feature
			fontFamily: {
				options: [
					'default',
					'Arial, Helvetica, sans-serif',
					'Courier New, Courier, monospace',
					'Georgia, serif',
					'Lucida Sans Unicode, Lucida Grande, sans-serif',
					'Tahoma, Geneva, sans-serif',
					'Times New Roman, Times, serif',
					'Trebuchet MS, Helvetica, sans-serif',
					'Verdana, Geneva, sans-serif'
				],
				supportAllValues: true
			},
			// https://ckeditor.com/docs/ckeditor5/latest/features/font.html#configuring-the-font-size-feature
			fontSize: {
				options: [ 10, 12, 14, 'default', 18, 20, 22 ],
				supportAllValues: true
			},
			
			// Be careful with enabling previews
			// https://ckeditor.com/docs/ckeditor5/latest/features/html-embed.html#content-previews
		   /* htmlEmbed: {
				showPreviews: true
			},*/
			// https://ckeditor.com/docs/ckeditor5/latest/features/link.html#custom-link-attributes-decorators
		   /* link: {
				decorators: {
					addTargetToExternalLinks: true,
					defaultProtocol: 'https://',
					toggleDownloadable: {
						mode: 'manual',
						label: 'Downloadable',
						attributes: {
							download: 'file'
						}
					}
				}
			},*/
			// https://ckeditor.com/docs/ckeditor5/latest/features/mentions.html#configuration
		   /* mention: {
				feeds: [
					{
						marker: '@',
						feed: [
							'@apple', '@bears', '@brownie', '@cake', '@cake', '@candy', '@canes', '@chocolate', '@cookie', '@cotton', '@cream',
							'@cupcake', '@danish', '@donut', '@dragée', '@fruitcake', '@gingerbread', '@gummi', '@ice', '@jelly-o',
							'@liquorice', '@macaroon', '@marzipan', '@oat', '@pie', '@plum', '@pudding', '@sesame', '@snaps', '@soufflé',
							'@sugar', '@sweet', '@topping', '@wafer'
						],
						minimumCharacters: 1
					}
				]
			},*/
			removePlugins: [
				// These two are commercial, but you can try them out without registering to a trial.
				// 'ExportPdf',
				// 'ExportWord',
				'AIAssistant',
				'CKBox',
				'CKFinder',
				'EasyImage',
				'RealTimeCollaborativeComments',
				'RealTimeCollaborativeTrackChanges',
				'RealTimeCollaborativeRevisionHistory',
				'PresenceList',
				'Comments',
				'TrackChanges',
				'TrackChangesData',
				'RevisionHistory',
				'Pagination',
				'WProofreader',
				'MathType',
				'SlashCommand',
				'Template',
				'DocumentOutline',
				'FormatPainter',
				'TableOfContents',
				'PasteFromOfficeEnhanced',
				'CaseChange'
				],
			ckfinder: {
                uploadUrl: "../php/ckfileupload.php",
          }
    })
    .then( editor => {
          console.log( editor );
    } )
    .catch( error => {
          console.error( error );
    });
 
	</script>
<script type="application/javascript">
function submitSubPagesFaq()
{
		/*const description = CKEDITOR.instances.description.getData();*/
		const description = document.getElementById("description").value;
		document.getElementById("errmsg").innerHTML="";
		document.getElementById("loading").style.display = "none";
		document.getElementById("msgstatus").style.display = "none";
		if(document.getElementById("sub_menu_id").value == "")
		{
			document.getElementById("errmsg").innerHTML="Service is mandatory";
			return false;
		}
		else if(document.getElementById("caption").value == "")
		{
			document.getElementById("errmsg").innerHTML="Caption is mandatory";
			return false;
		}
		else 
		{
			if(description == "")
			{
				document.getElementById("errmsg").innerHTML="Description is mandatory";
				return false;
			}
		}
	/*	document.getElementById("loading").style.display = "block";*/
		document.getElementById("errmsg").innerHTML="";
		return true;
}


var frmaddsubpagesfaqExists = document.getElementById("frmaddsubpagesfaq");
if(frmaddsubpagesfaqExists)
{
		document.getElementById('frmaddsubpagesfaq').onsubmit=function(e){
					/*const description = CKEDITOR.instances.description.getData();*/
					const description = document.getElementById("description").value;
					if(description != "")
					{
							e.preventDefault();
							var xhr=new XMLHttpRequest();
							var url="../php/subpagesfaq.php";
							xhr.open('post',url,true);
							var formData=new FormData(frmaddsubpagesfaq);
							formData.append("description", description);
							formData.append("add", "add");
							xhr.send(formData);
							xhr.onload=function() {
							if(this.response == "New record created successfully.")
							{
								document.getElementById("msgstatus").style.display = "block";
								document.getElementById("loading").style.display = "none";
								document.getElementById("msgstatus").innerHTML=this.response;
								const submittedFormId = e.target.id;
								clearForm(submittedFormId);
								setTimeout(()=>{
									document.getElementById("msgstatus").style.display = "none";
								},4000)
							}};
					 }
					 else
					 {
							 e.preventDefault();
					 }
		};
}

function editSubPagesFaq(id)
{
	 window.location.href="edit.php?id="+id;
}


function submitEditSubPagesFaq()
{
		/*const description = CKEDITOR.instances.description.getData();*/
		const description = document.getElementById("description").value;
		document.getElementById("errmsg").innerHTML="";
		document.getElementById("loading").style.display = "none";
		document.getElementById("msgstatus").style.display = "none";
		if(document.getElementById("sub_menu_id").value == "")
		{
			document.getElementById("errmsg").innerHTML="Service is mandatory";
			return false;
		}
		else if(document.getElementById("caption").value == "")
		{
			document.getElementById("errmsg").innerHTML="Caption is mandatory";
			return false;
		}
		else 
		{
			if(description == "")
			{
				document.getElementById("errmsg").innerHTML="Description is mandatory";
				return false;
			}
		}
	
		/*document.getElementById("loading").style.display = "block";*/
		document.getElementById("errmsg").innerHTML="";
		return true;
}
	
var frmeditsubpagesfaqExists = document.getElementById("frmeditsubpagesfaq");
if(frmeditsubpagesfaqExists)
{
		document.getElementById('frmeditsubpagesfaq').onsubmit=function(e){
					/*const description = CKEDITOR.instances.description.getData();*/
					const description = document.getElementById("description").value;
					if(description != "")
					{
									e.preventDefault();
									var xhr=new XMLHttpRequest();
									var url="../php/subpagesfaq.php";
									xhr.open('post',url,true);
									var formData=new FormData(frmeditsubpagesfaq);
									formData.append("description", description);
									formData.append("update", "update");
									xhr.send(formData);
									xhr.onload=function() {
									if(this.response == "Updated successfully.")
									{
										document.getElementById("msgstatus").style.display = "block";
										document.getElementById("loading").style.display = "none";
										document.getElementById("msgstatus").innerHTML=this.response;
										const submittedFormId = e.target.id;
									//	frmeditsubpagesfaq.reset();
										clearForm(submittedFormId);
										setTimeout(()=>{
											document.getElementById("msgstatus").style.display = "none";
										},4000)
									}};
					}
					else
					{
							 e.preventDefault();
					}
	};
}

function clearForm(formId)
{
	const form = document.getElementById(formId); // Replace "myForm" with the ID of your form
	const elements = form.elements;
	 for (let i = 0; i < elements.length; i++) 
	 {
		 const element = elements[i];
	
		 // Check if the element is an input or textarea and clear its value
		 if (element.tagName === "INPUT" || element.tagName === "TEXTAREA") {
			 element.value = "";
		 }
		 var description = CKEDITOR.instances.description;
		 description.setData('');
	}
}

function deleteSubPagesFaq(id)
{
		var result = confirm("Are you sure to delete?");
	    if(result)
		{
				var xhr=new XMLHttpRequest();
				var url="../php/subpagesfaq.php";
				xhr.open('post',url,true);
				var formData=new FormData(frmlistsubpagesfaq);
				formData.append("delete", "delete");
				formData.append("id", id);
				xhr.send(formData);
				xhr.onload=function() {
				if(this.response == "Deleted Successfully.")
				{
					document.getElementById("msgstatus").style.display = "block";
					document.getElementById("loading").style.display = "none";
					document.getElementById("msgstatus").innerHTML=this.response;
					setTimeout(()=>{
						document.getElementById("msgstatus").style.display = "none";
					},4000)
					window.location.href="list.php";
					document.getElementById("msgstatus").style.display = "block";
					document.getElementById("loading").style.display = "none";
					document.getElementById("msgstatus").innerHTML=this.response;
				}
				};
		}
}
/*var descriptionExists = document.getElementById("description");
if(descriptionExists)
{
	CKEDITOR.replace('description',
	{
		uiColor : '#eeeeee',
		height : '300',
		language :'eng',
		filebrowserBrowseUrl : "../assets/ckfinder/ckfinder.html",
		filebrowserImageBrowseUrl : "../assets/ckfinder/ckfinder.html?type=Images",
		filebrowserFlashBrowseUrl : "../assets/ckfinder/ckfinder.html?type=Flash",
		filebrowserUploadUrl : "../assets/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files",
		filebrowserImageUploadUrl : "../assets/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images",
		filebrowserFlashUploadUrl : "../assets/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash"
	});
}
*/</script>