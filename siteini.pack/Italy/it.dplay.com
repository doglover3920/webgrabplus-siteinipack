**------------------------------------------------------------------------------------------------
* @header_start
* WebGrab+Plus ini for grabbing EPG data from TvGuide websites
* @Site: it.dplay.com
* @MinSWversion: V2
* @Revision 0 - [05/02/2020] doglover
*   - creation
* @Remarks:
* @header_end
**------------------------------------------------------------------------------------------------
site {url=it.dplay.com|timezone=GMT|maxdays=6.1|cultureinfo=it-IT|charset=UTF-8|titlematchfactor=90}
urldate.format {datestring|yyyy-MM-dd}
url_index{url ()|https://it.dplay.com/ajax/epg/?startDate=|urldate|T00:00:00.000Z&endDate=##enddate##T23:00:00.000Z&channel=|channel|}
url_index.headers 	  {customheader=Accept-Encoding=gzip,deflate} 
*
scope.range {(urlindex)|end}
global_temp_1.modify {calculate(format=F0)|'config_timespan_days'}
index_variable_element.modify {clear}
index_variable_element {addstart (format=date,yyyy-MM-dd)|'urldate'}
index_variable_element.modify {calculate(format=date,yyyy-MM-dd)|'urldate' 'global_temp_1':00:00 +} 
url_index.modify {replace|##enddate##|'index_variable_element'}
end_scope
*
index_showsplit.scrub {multi()|<div class="epg_element"|||}
*
index_start.scrub {single|data-utcstart="||Z"|"}
index_stop.scrub {single|data-utcend="||Z"|"}
index_title.scrub {single|class="epg_show_title">||</a>|</a>}
index_subtitle.scrub {single|class="epg_episode_title">||</p>|</p>}
index_description.scrub {single|<h3 class="epg_modal_description">||</h3>|</h3>}
index_description.modify {remove|'index_subtitle' - }
**  _  _  _  _  _  _  _  _  _  _  _  _  _  _  _  _  _  _  _  _  _  _  _  _  _  _  _  _  _  _  _  _
**      #####  CHANNEL FILE CREATION (only to create the xxx-channel.xml file)
**
** @auto_xml_channel_start
*url_index{url|https://it.dplay.com/live/}
*index_site_id.scrub {multi|<div class="e-grid__item">|<a href="/|/"|</a>}
*index_site_channel.scrub {multi|<div class="e-grid__item">|alt=" - |">|</a>}
*index_site_channel.modify {cleanup(tags="<"">")}
*index_site_id.modify {cleanup(removeduplicates=equal,100 link="index_site_channel")}
** @auto_xml_channel_end
