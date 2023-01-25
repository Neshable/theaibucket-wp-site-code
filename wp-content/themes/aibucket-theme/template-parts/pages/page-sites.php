<?php
// Page dashboard
?>

<div class="antialiased font-body text-high-emphasis bg-surface">
   <div class="relative bg-primary text-white">
	  <div class="max-w-screen-xl mx-auto py-3 px-3 sm:px-6 lg:px-8">
		 <div class="pr-16 sm:text-center sm:px-16">
			<p class="font-medium text-on-primary"> You are currently in a demo environment. </p>
		 </div>
	  </div>
   </div>
   <!---->
   <div style="display: none;"></div>
   <div class="fixed inset-0 z-50 flex flex-col items-end w-full h-screen p-6 pointer-events-none">
	  <!---->
   </div>
   <div class="fixed inset-0 z-50 flex items-start justify-end p-5 pointer-events-none">
	  <div enter-class="translate-x-6 opacity-0" leave-class="opacity-100" class="flex flex-col space-y-2"></div>
   </div>
   <!----><!----><!---->
   <div class="flex flex-col min-h-screen">
	  <!----><!---->
	  <header class="sticky top-0 border-b border-low-emphasis bg-top-bar z-30">
		 <div class="w-full px-4 sm:px-8 mx-auto max-w-top-bar-container">
			<div class="flex flex-col">
			   <nav class="flex flex-col items-center justify-between py-4 space-y-4 md:space-y-0 md:flex-row text-top-bar">
				  <div class="flex items-center space-x-5">
					 <!---->
					 <ul class="flex items-center space-x-2">
						<li><a href="/" class="font-medium text-body text-breadcrumbs">Core Demo</a><span class="ml-2 text-low-emphasis">/</span></li>
						<li>
						   <a href="https://demo.ploi-core.io/sites" class="font-medium text-body text-breadcrumbs">Sites</a><!---->
						</li>
					 </ul>
				  </div>
				  <ul class="flex items-center space-x-4">
					 <li aria-label="Search" data-balloon-blunt="" data-balloon-pos="down">
						<button class="inline-flex items-center justify-center w-10 h-10 text-medium-emphasis rounded-circle focus:outline-none focus:text-high-emphasis">
						   <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-search text-top-bar" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
							  <path fill-rule="evenodd" d="M10.442 10.442a1 1 0 0 1 1.415 0l3.85 3.85a1 1 0 0 1-1.414 1.415l-3.85-3.85a1 1 0 0 1 0-1.415z"></path>
							  <path fill-rule="evenodd" d="M6.5 12a5.5 5.5 0 1 0 0-11 5.5 5.5 0 0 0 0 11zM13 6.5a6.5 6.5 0 1 1-13 0 6.5 6.5 0 0 1 13 0z"></path>
						   </svg>
						</button>
					 </li>
					 <li aria-label="Enable dark mode" data-balloon-blunt="" data-balloon-pos="down">
						<button class="inline-flex items-center justify-center w-10 h-10 text-medium-emphasis rounded-circle focus:outline-none focus:text-high-emphasis">
						   <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-moon text-top-bar" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
							  <path fill-rule="evenodd" d="M14.53 10.53a7 7 0 0 1-9.058-9.058A7.003 7.003 0 0 0 8 15a7.002 7.002 0 0 0 6.53-4.47z"></path>
						   </svg>
						   <!---->
						</button>
					 </li>
					 <li>
						<div class="relative">
						   <button class="flex h-auto m-0 appearance-none items-center"><span>Demo</span><img class="ml-2 inline w-8 h-8 rounded-avatar bg-surface-2" src="https://www.gravatar.com/avatar/18ef499f53a39d2291de15a708b59d35?s=150" alt="Demo"></button><!---->
						</div>
					 </li>
				  </ul>
			   </nav>
			   <nav class="flex items-center justify-center pb-4">
				  <ul class="inline-flex flex-row p-1 overflow-hidden overflow-x-auto whitespace-nowrap rounded bg-tab-bar">
					 <li><a href="https://demo.ploi-core.io/" class="inline-flex items-center justify-center h-10 px-6 font-medium rounded text-small text-tab-bar transition duration-fast hover:text-high-emphasis focus:text-high-emphasis">Dashboard</a></li>
					 <li><a href="https://demo.ploi-core.io/sites" class="inline-flex items-center justify-center h-10 px-6 font-medium rounded text-small text-tab-bar transition duration-fast hover:text-high-emphasis focus:text-high-emphasis shadow text-tab-bar-active bg-tab-bar-item">Sites</a></li>
					 <li><a href="https://demo.ploi-core.io/servers" class="inline-flex items-center justify-center h-10 px-6 font-medium rounded text-small text-tab-bar transition duration-fast hover:text-high-emphasis focus:text-high-emphasis">Servers</a></li>
				  </ul>
			   </nav>
			</div>
		 </div>
	  </header>
	  <main id="main" class="flex-1 bg-surface-1">
		 <div class="w-full px-4 sm:px-8 mx-auto max-w-5xl">
			<header class="flex justify-between mt-16 mb-8">
			   <div>
				  <h1 class="font-semibold text-heading">Sites</h1>
			   </div>
			   <div><button class="items-center justify-center font-medium capitalize rounded select-none focus:outline-none h-10 px-5 bg-primary text-on-primary shadow inline-flex text-small">Create site</button></div>
			</header>
			<section class="my-8 space-y-8">
			   <!---->
			   <ul class="flex flex-col divide-y divide-low-emphasis">
				  <li>
					 <div class="-mx-4">
						<div class="block p-4 transition rounded shadow-none duration-fast hover:bg-surface-2">
						   <div class="flex flex-row items-center space-x-4">
							  <div aria-label="Active" data-balloon-blunt="" data-balloon-pos="down" class="flex items-center justify-center w-2 h-2 rounded-circle relative bg-success">
								 <!---->
							  </div>
							  <div class="flex-1">
								 <h2 class="font-medium text-body"><a href="https://demo.ploi-core.io/sites/6" class="text-primary font-medium">awesome.com</a></h2>
								 <p class="text-small text-medium-emphasis">
								 <div class="flex items-center space-x-2">
									<div class="flex items-center space-x-2">
									   <span>
										  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512" width="1.5em" height="1.5em" fill="currentColor">
											 <path d="M320 104.5c171.4 0 303.2 72.2 303.2 151.5S491.3 407.5 320 407.5c-171.4 0-303.2-72.2-303.2-151.5S148.7 104.5 320 104.5m0-16.8C143.3 87.7 0 163 0 256s143.3 168.3 320 168.3S640 349 640 256 496.7 87.7 320 87.7zM218.2 242.5c-7.9 40.5-35.8 36.3-70.1 36.3l13.7-70.6c38 0 63.8-4.1 56.4 34.3zM97.4 350.3h36.7l8.7-44.8c41.1 0 66.6 3 90.2-19.1 26.1-24 32.9-66.7 14.3-88.1-9.7-11.2-25.3-16.7-46.5-16.7h-70.7L97.4 350.3zm185.7-213.6h36.5l-8.7 44.8c31.5 0 60.7-2.3 74.8 10.7 14.8 13.6 7.7 31-8.3 113.1h-37c15.4-79.4 18.3-86 12.7-92-5.4-5.8-17.7-4.6-47.4-4.6l-18.8 96.6h-36.5l32.7-168.6zM505 242.5c-8 41.1-36.7 36.3-70.1 36.3l13.7-70.6c38.2 0 63.8-4.1 56.4 34.3zM384.2 350.3H421l8.7-44.8c43.2 0 67.1 2.5 90.2-19.1 26.1-24 32.9-66.7 14.3-88.1-9.7-11.2-25.3-16.7-46.5-16.7H417l-32.8 168.7z"></path>
										  </svg>
									   </span>
									   <span>7.3</span>
									</div>
									<!----><!---->
									<div>·</div>
									<div>On server webserver-01</div>
								 </div>
								 </p>
							  </div>
							  <div class="relative">
								 <button class="inline-flex items-center justify-center w-10 h-10 text-medium-emphasis rounded-circle focus:outline-none focus:text-high-emphasis">
									<svg width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg" class="w-5 h-5">
									   <path fill-rule="evenodd" d="M3 9.5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3z"></path>
									</svg>
								 </button>
								  
                                <button id="dropdownDefaultButton" data-dropdown-toggle="dropdown" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">Dropdown button <svg class="w-4 h-4 ml-2" aria-hidden="true" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg></button>
                                <!-- Dropdown menu -->
                                <div id="dropdown" class="z-10 hidden bg-white divide-y divide-gray-100 rounded shadow w-44 dark:bg-gray-700">
                                    <ul class="py-1 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefaultButton">
                                    <li>
                                        <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Dashboard</a>
                                    </li>
                                    <li>
                                        <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Settings</a>
                                    </li>
                                    <li>
                                        <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Earnings</a>
                                    </li>
                                    <li>
                                        <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Sign out</a>
                                    </li>
                                    </ul>
                                </div>

								 <!---->
							  </div>
						   </div>
						</div>
					 </div>
				  </li>
			   </ul>
			   <!---->
			</section>
		 </div>
	  </main>
   </div>
</div>
