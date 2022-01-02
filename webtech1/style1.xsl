<?xml version="1.0"?>
<xsl:stylesheet version="1.0"
xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
<xsl:template match="/">

<html lang="en">
    <head>
        <meta charset="utf-8"></meta>
        <meta name="viewport" content="width=device-width, initial-scale=1"></meta>
        <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet"></link>
        <title>Project Team Members</title>
    </head>
    <body style="background-color:rbga(0,2,0,0.6);">
        <section class="text-gray-600 body-font overflow-hidden">
        <div class="container px-5 py-10 mx-auto">
          <div class="flex flex-col text-center w-full mb-20">
            <h1 class="sm:text-4xl text-3xl font-medium title-font mb-2 text-gray-900">Project Info</h1>
            <p class="lg:w-2/3 mx-auto leading-relaxed text-base text-gray-500">technologies worked on.</p>
          </div>
          <div class="flex flex-wrap -m-4">
            <xsl:for-each select="Project/tech">
            <div class="p-4 xl:w-1/3 md:w-1/2 w-full" >
              <div class="h-full p-6 flex flex-col relative overflow-hidden" style="box-shadow:5px 5px black;background-color:rgba(0,181,230,0.6);border-radius:20px">
                <h1 class="text-5xl text-gray-900 pb-4 mb-4 border-b border-gray-200 leading-none"><xsl:value-of select="type" /></h1>
                <p><xsl:value-of select="technology" /></p>
                <p><xsl:value-of select="description" /></p>
              </div>
            </div>
            </xsl:for-each>
          </div>
        </div>
      </section>
    </body>
</html>

</xsl:template>
</xsl:stylesheet>
