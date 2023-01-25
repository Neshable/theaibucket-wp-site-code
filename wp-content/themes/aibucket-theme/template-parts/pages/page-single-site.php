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
                        <li><a href="https://demo.ploi-core.io/sites" class="font-medium text-body text-breadcrumbs">Sites</a><span class="ml-2 text-low-emphasis">/</span></li>
                        <li>
                           <a href="https://demo.ploi-core.io/sites/6" class="font-medium text-body text-breadcrumbs">awesome.com</a><!---->
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
                  <h1 class="font-semibold text-heading flex space-x-2 items-center">
                     <span>awesome.com</span>
                     <a href="http://awesome.com" class="text-primary" target="_blank">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-primary hover:scale-125" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                           <path stroke-linecap="round" stroke-linejoin="round" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path>
                        </svg>
                     </a>
                  </h1>
               </div>
               <div></div>
            </header>
            <section class="my-8 space-y-8">
               <div class="grid grid-cols-4 gap-8 md:gap-16">
                  <aside class="col-span-4 md:col-span-1">
                     <ul class="md:-ml-4 space-y-1">
                        <li><a target="_self" href="https://demo.ploi-core.io/sites/6" class="flex items-center h-10 px-4 font-medium text-medium-emphasis rounded shadow text-primary bg-surface-3">General </a></li>
                        <li><a target="_self" href="https://demo.ploi-core.io/sites/6/apps" class="flex items-center h-10 px-4 font-medium text-medium-emphasis">Apps </a></li>
                        <li><a target="_self" href="https://demo.ploi-core.io/sites/6/databases" class="flex items-center h-10 px-4 font-medium text-medium-emphasis">Databases </a></li>
                        <li><a target="_self" href="https://demo.ploi-core.io/sites/6/cronjobs" class="flex items-center h-10 px-4 font-medium text-medium-emphasis">Cronjobs </a></li>
                        <li><a target="_self" href="https://demo.ploi-core.io/sites/6/redirects" class="flex items-center h-10 px-4 font-medium text-medium-emphasis">Redirects </a></li>
                        <li><a target="_self" href="https://demo.ploi-core.io/sites/6/certificates" class="flex items-center h-10 px-4 font-medium text-medium-emphasis">Certificates </a></li>
                        <li><a target="_self" href="https://demo.ploi-core.io/sites/6/aliases" class="flex items-center h-10 px-4 font-medium text-medium-emphasis">Aliases </a></li>
                        <li>
                           <!---->
                        </li>
                        <li>
                           <!---->
                        </li>
                        <li><a target="_blank" class="flex items-center h-10 px-4 font-medium text-medium-emphasis" href="http://awesome.com">View site </a></li>
                     </ul>
                  </aside>
                  <section class="col-span-4 md:col-span-3">
                     <div class="space-y-16">
                        <section class="px-8 pb-8 space-y-6 border rounded border-low-emphasis">
                           <header class="-mt-4">
                              <h2 class="inline-flex px-4 -mx-4 font-medium bg-surface-1 text-title">Overview</h2>
                              <p class="mt-1 text-small text-medium-emphasis"></p>
                           </header>
                           <div class="space-y-4">
                              <div>
                                 <table class="w-full text-left table-auto text-small">
                                    <caption class="sr-only">Database list overview</caption>
                                    <tbody>
                                       <tr>
                                          <th class="pb-2">Website path</th>
                                          <td class="py-2"> /home/dklyj470xz/awesome.com</td>
                                       </tr>
                                       <tr>
                                          <th class="pb-2">FTP host</th>
                                          <td class="py-2"><span class="cursor-pointer">217.69.0.208</span></td>
                                       </tr>
                                       <tr>
                                          <th class="pb-2">FTP user</th>
                                          <td class="py-2"><span class="cursor-pointer">dklyj470xz</span></td>
                                       </tr>
                                       <tr>
                                          <th class="pb-2">FTP password</th>
                                          <td class="py-2"><button class="items-center justify-center font-medium capitalize rounded select-none focus:outline-none h-8 px-2 bg-surface-2 text-high-emphasis inline-flex text-small">Request FTP password</button></td>
                                       </tr>
                                       <tr>
                                          <th class="pb-2">Creation date</th>
                                          <td class="py-2">2020-08-17 09:08:58</td>
                                       </tr>
                                    </tbody>
                                 </table>
                              </div>
                           </div>
                        </section>
                        <section class="px-8 pb-8 space-y-6 border rounded border-low-emphasis">
                           <header class="-mt-4">
                              <h2 class="inline-flex px-4 -mx-4 font-medium bg-surface-1 text-title">DNS settings</h2>
                              <p class="mt-1 text-small text-medium-emphasis">Setup these DNS records to attach your webhosting to your domain.</p>
                           </header>
                           <div class="space-y-4">
                              <form class="space-y-4">
                                 <div class="grid grid-cols-2 gap-4">
                                    <div class="col-span-2 md:col-span-1">
                                       <div class="flex flex-col space-y-1 relative">
                                          <label class="text-small">A</label><!----><!----><input class="w-full border-medium-emphasis text-body h-10 px-2 border rounded bg-surface-1 focus:outline-none focus:border-primary" type="text"><!----><!---->
                                       </div>
                                    </div>
                                    <div class="col-span-2 md:col-span-1">
                                       <div class="flex flex-col space-y-1 relative">
                                          <label class="text-small">IP</label>
                                          <button type="button" class="flex items-center right-0 absolute text-xs text-medium-emphasis">
                                             <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-clipboard mr-2" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" d="M4 1.5H3a2 2 0 0 0-2 2V14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V3.5a2 2 0 0 0-2-2h-1v1h1a1 1 0 0 1 1 1V14a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V3.5a1 1 0 0 1 1-1h1v-1z"></path>
                                                <path fill-rule="evenodd" d="M9.5 1h-3a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5zm-3-1A1.5 1.5 0 0 0 5 1.5v1A1.5 1.5 0 0 0 6.5 4h3A1.5 1.5 0 0 0 11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3z"></path>
                                             </svg>
                                             Copy
                                          </button>
                                          <!----><input class="w-full border-medium-emphasis text-body h-10 px-2 border rounded bg-surface-1 focus:outline-none focus:border-primary" type="text"><!----><!---->
                                       </div>
                                    </div>
                                 </div>
                                 <div class="grid grid-cols-2 gap-4">
                                    <div class="col-span-2 md:col-span-1">
                                       <div class="flex flex-col space-y-1 relative">
                                          <label class="text-small">A</label><!----><!----><input class="w-full border-medium-emphasis text-body h-10 px-2 border rounded bg-surface-1 focus:outline-none focus:border-primary" type="text"><!----><!---->
                                       </div>
                                    </div>
                                    <div class="col-span-2 md:col-span-1">
                                       <div class="flex flex-col space-y-1 relative">
                                          <label class="text-small">IP</label>
                                          <button type="button" class="flex items-center right-0 absolute text-xs text-medium-emphasis">
                                             <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-clipboard mr-2" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" d="M4 1.5H3a2 2 0 0 0-2 2V14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V3.5a2 2 0 0 0-2-2h-1v1h1a1 1 0 0 1 1 1V14a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V3.5a1 1 0 0 1 1-1h1v-1z"></path>
                                                <path fill-rule="evenodd" d="M9.5 1h-3a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5zm-3-1A1.5 1.5 0 0 0 5 1.5v1A1.5 1.5 0 0 0 6.5 4h3A1.5 1.5 0 0 0 11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3z"></path>
                                             </svg>
                                             Copy
                                          </button>
                                          <!----><input class="w-full border-medium-emphasis text-body h-10 px-2 border rounded bg-surface-1 focus:outline-none focus:border-primary" type="text"><!----><!---->
                                       </div>
                                    </div>
                                 </div>
                              </form>
                           </div>
                        </section>
                        <!---->
                     </div>
                  </section>
               </div>
            </section>
         </div>
      </main>
   </div>
</div>