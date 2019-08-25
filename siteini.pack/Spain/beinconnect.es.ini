**------------------------------------------------------------------------------------------------
* @header_start
* WebGrab+Plus ini for grabbing EPG data from TvGuide websites
* @Site: beinconnect.es
* @MinSWversion: V2
* @Revision 1 - [23/08/2019] doglover
*     - new website
* @Revision 0 - [02/03/2017] Netuddki
*     - create
* @Remarks: your_remarks
* @header_end
**------------------------------------------------------------------------------------------------

site {url=beinconnect.es|timezone=GMT|maxdays=4|cultureinfo=es-ES|charset=UTF-8|titlematchfactor=90|keepindexpage}
url_index{url|https://static.beinconnect.es/uploads/beinconnect/data/webv2/broadcasts.json}
url_index.headers {customheader=Accept-Encoding=gzip,deflate}
*urldate.format {datestring|yyyy-MM-dd}

index_variable_element.modify {set|"key":"'config_site_id'_}
index_showsplit.scrub {multi()|'index_variable_element'|||}}
index_showsplit.modify {cleanup(removeduplicates)}
index_start.scrub {single ()|"start":||,|,}
index_stop.scrub {single|"end":||,|,}
index_title.scrub {single|"title":"||",|",}
index_subtitle.scrub {single|"subTitle":"||",|",}
index_description.scrub {single|"description":"||",|",}
index_description.modify {cleanup}

*
*
**  _  _  _  _  _  _  _  _  _  _  _  _  _  _  _  _  _  _  _  _  _  _  _  _  _  _  _  _  _  _  _  _
**      #####  CHANNEL FILE CREATION (only to create the xxx-channel.xml file)
**
** @auto_xml_channel_start
*index_site_id.scrub {multi ()|"updated":|"key":"|",|"thumb"}
*index_site_channel.scrub {multi ()|"updated":|"title":"|",|"thumb"}
*index_site_id.modify {cleanup(removeduplicates=equal,100 link="index_site_channel")}
** @auto_xml_channel_end
