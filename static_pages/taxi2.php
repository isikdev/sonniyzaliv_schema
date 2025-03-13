<?php
    require ('functions.php');

    $LastModified_unix = getlastmod(); // время последнего изменения страницы
    $LastModified = gmdate("D, d M Y H:i:s \G\M\T", $LastModified_unix);
    $IfModifiedSince = false;

    if (isset($_ENV['HTTP_IF_MODIFIED_SINCE']))
        $IfModifiedSince = strtotime(substr($_ENV['HTTP_IF_MODIFIED_SINCE'], 5));

    if (isset($_SERVER['HTTP_IF_MODIFIED_SINCE']))
        $IfModifiedSince = strtotime(substr($_SERVER['HTTP_IF_MODIFIED_SINCE'], 5));

    if ($IfModifiedSince && $IfModifiedSince >= $LastModified_unix)
    {
        header($_SERVER['SERVER_PROTOCOL'] . ' 304 Not Modified');
        exit;
    }

    header('Last-Modified: '. $LastModified);

    $title = 'Сонный Залив - такси в Сортавала. Такси города Сортавала по минимальным ценам, с описанием услуг и стоимости поездки';
    $descr = 'Потребовалась необходимость в такси, но не знаете куда позвонить? Мы поможем Вам более подробно ознакомиться и узнать: номера телефонов для вызова, официальный сайт, все тарифы и цены на услуги, а также, контакты служб такси в Сортавала по низким ценам';
    $keywords = 'такси Сортавала, такси, такси дешево, такси Карелии, номер такси Сортавала, вызвать такси Сортавала';

    $iconBlock = getSubscribeIconBlock();
    $subsMenu = getSubscribeMenu();
    $footer = getFooter();
?>

<!DOCTYPE html>
<!doctype html>
<html xmlns:v="urn:schemas-microsoft-com:vml"
xmlns:o="urn:schemas-microsoft-com:office:office"
xmlns:w="urn:schemas-microsoft-com:office:word"
xmlns:m="http://schemas.microsoft.com/office/2004/12/omml"
xmlns="http://www.w3.org/TR/REC-html40">

<head>
<meta http-equiv=Content-Type content="text/html; charset=windows-1251">
<meta name=ProgId content=Word.Document>
<meta name=Generator content="Microsoft Word 15">
<meta name=Originator content="Microsoft Word 15">
<link rel=File-List
href="1%20Карельские%20базы%20отдыха%20на%20берегу%20(с%20картинками).files/filelist.xml">
<link rel=Edit-Time-Data
href="1%20Карельские%20базы%20отдыха%20на%20берегу%20(с%20картинками).files/editdata.mso">
<!--[if !mso]>
<style>
v\:* {behavior:url(#default#VML);}
o\:* {behavior:url(#default#VML);}
w\:* {behavior:url(#default#VML);}
.shape {behavior:url(#default#VML);}
</style>
<![endif]-->
<title>Карелия базы отдыха</title>
<!--[if gte mso 9]><xml>
 <o:DocumentProperties>
  <o:Author>Алексей</o:Author>
  <o:Template>Normal</o:Template>
  <o:LastAuthor>Алексей</o:LastAuthor>
  <o:Revision>2</o:Revision>
  <o:TotalTime>3</o:TotalTime>
  <o:Created>2024-06-07T19:50:00Z</o:Created>
  <o:LastSaved>2024-06-07T19:50:00Z</o:LastSaved>
  <o:Pages>1</o:Pages>
  <o:Words>1636</o:Words>
  <o:Characters>9329</o:Characters>
  <o:Lines>77</o:Lines>
  <o:Paragraphs>21</o:Paragraphs>
  <o:CharactersWithSpaces>10944</o:CharactersWithSpaces>
  <o:Version>16.00</o:Version>
 </o:DocumentProperties>
</xml><![endif]-->
<link rel=themeData
href="1%20Карельские%20базы%20отдыха%20на%20берегу%20(с%20картинками).files/themedata.thmx">
<link rel=colorSchemeMapping
href="1%20Карельские%20базы%20отдыха%20на%20берегу%20(с%20картинками).files/colorschememapping.xml">
<!--[if gte mso 9]><xml>
 <w:WordDocument>
  <w:SpellingState>Clean</w:SpellingState>
  <w:GrammarState>Clean</w:GrammarState>
  <w:TrackMoves>false</w:TrackMoves>
  <w:TrackFormatting/>
  <w:PunctuationKerning/>
  <w:ValidateAgainstSchemas/>
  <w:SaveIfXMLInvalid>false</w:SaveIfXMLInvalid>
  <w:IgnoreMixedContent>false</w:IgnoreMixedContent>
  <w:AlwaysShowPlaceholderText>false</w:AlwaysShowPlaceholderText>
  <w:DoNotPromoteQF/>
  <w:LidThemeOther>RU</w:LidThemeOther>
  <w:LidThemeAsian>X-NONE</w:LidThemeAsian>
  <w:LidThemeComplexScript>X-NONE</w:LidThemeComplexScript>
  <w:Compatibility>
   <w:BreakWrappedTables/>
   <w:SnapToGridInCell/>
   <w:WrapTextWithPunct/>
   <w:UseAsianBreakRules/>
   <w:DontGrowAutofit/>
   <w:SplitPgBreakAndParaMark/>
   <w:EnableOpenTypeKerning/>
   <w:DontFlipMirrorIndents/>
   <w:OverrideTableStyleHps/>
  </w:Compatibility>
  <w:DoNotOptimizeForBrowser/>
  <m:mathPr>
   <m:mathFont m:val="Cambria Math"/>
   <m:brkBin m:val="before"/>
   <m:brkBinSub m:val="&#45;-"/>
   <m:smallFrac m:val="off"/>
   <m:dispDef/>
   <m:lMargin m:val="0"/>
   <m:rMargin m:val="0"/>
   <m:defJc m:val="centerGroup"/>
   <m:wrapIndent m:val="1440"/>
   <m:intLim m:val="subSup"/>
   <m:naryLim m:val="undOvr"/>
  </m:mathPr></w:WordDocument>
</xml><![endif]--><!--[if gte mso 9]><xml>
 <w:LatentStyles DefLockedState="false" DefUnhideWhenUsed="false"
  DefSemiHidden="false" DefQFormat="false" DefPriority="99"
  LatentStyleCount="371">
  <w:LsdException Locked="false" Priority="0" QFormat="true" Name="Normal"/>
  <w:LsdException Locked="false" Priority="9" QFormat="true" Name="heading 1"/>
  <w:LsdException Locked="false" Priority="9" SemiHidden="true"
   UnhideWhenUsed="true" QFormat="true" Name="heading 2"/>
  <w:LsdException Locked="false" Priority="9" SemiHidden="true"
   UnhideWhenUsed="true" QFormat="true" Name="heading 3"/>
  <w:LsdException Locked="false" Priority="9" SemiHidden="true"
   UnhideWhenUsed="true" QFormat="true" Name="heading 4"/>
  <w:LsdException Locked="false" Priority="9" SemiHidden="true"
   UnhideWhenUsed="true" QFormat="true" Name="heading 5"/>
  <w:LsdException Locked="false" Priority="9" SemiHidden="true"
   UnhideWhenUsed="true" QFormat="true" Name="heading 6"/>
  <w:LsdException Locked="false" Priority="9" SemiHidden="true"
   UnhideWhenUsed="true" QFormat="true" Name="heading 7"/>
  <w:LsdException Locked="false" Priority="9" SemiHidden="true"
   UnhideWhenUsed="true" QFormat="true" Name="heading 8"/>
  <w:LsdException Locked="false" Priority="9" SemiHidden="true"
   UnhideWhenUsed="true" QFormat="true" Name="heading 9"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="index 1"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="index 2"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="index 3"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="index 4"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="index 5"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="index 6"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="index 7"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="index 8"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="index 9"/>
  <w:LsdException Locked="false" Priority="39" SemiHidden="true"
   UnhideWhenUsed="true" Name="toc 1"/>
  <w:LsdException Locked="false" Priority="39" SemiHidden="true"
   UnhideWhenUsed="true" Name="toc 2"/>
  <w:LsdException Locked="false" Priority="39" SemiHidden="true"
   UnhideWhenUsed="true" Name="toc 3"/>
  <w:LsdException Locked="false" Priority="39" SemiHidden="true"
   UnhideWhenUsed="true" Name="toc 4"/>
  <w:LsdException Locked="false" Priority="39" SemiHidden="true"
   UnhideWhenUsed="true" Name="toc 5"/>
  <w:LsdException Locked="false" Priority="39" SemiHidden="true"
   UnhideWhenUsed="true" Name="toc 6"/>
  <w:LsdException Locked="false" Priority="39" SemiHidden="true"
   UnhideWhenUsed="true" Name="toc 7"/>
  <w:LsdException Locked="false" Priority="39" SemiHidden="true"
   UnhideWhenUsed="true" Name="toc 8"/>
  <w:LsdException Locked="false" Priority="39" SemiHidden="true"
   UnhideWhenUsed="true" Name="toc 9"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="Normal Indent"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="footnote text"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="annotation text"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="header"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="footer"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="index heading"/>
  <w:LsdException Locked="false" Priority="35" SemiHidden="true"
   UnhideWhenUsed="true" QFormat="true" Name="caption"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="table of figures"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="envelope address"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="envelope return"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="footnote reference"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="annotation reference"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="line number"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="page number"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="endnote reference"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="endnote text"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="table of authorities"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="macro"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="toa heading"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="List"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="List Bullet"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="List Number"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="List 2"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="List 3"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="List 4"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="List 5"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="List Bullet 2"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="List Bullet 3"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="List Bullet 4"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="List Bullet 5"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="List Number 2"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="List Number 3"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="List Number 4"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="List Number 5"/>
  <w:LsdException Locked="false" Priority="10" QFormat="true" Name="Title"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="Closing"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="Signature"/>
  <w:LsdException Locked="false" Priority="1" SemiHidden="true"
   UnhideWhenUsed="true" Name="Default Paragraph Font"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="Body Text"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="Body Text Indent"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="List Continue"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="List Continue 2"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="List Continue 3"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="List Continue 4"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="List Continue 5"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="Message Header"/>
  <w:LsdException Locked="false" Priority="11" QFormat="true" Name="Subtitle"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="Salutation"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="Date"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="Body Text First Indent"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="Body Text First Indent 2"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="Note Heading"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="Body Text 2"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="Body Text 3"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="Body Text Indent 2"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="Body Text Indent 3"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="Block Text"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="Hyperlink"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="FollowedHyperlink"/>
  <w:LsdException Locked="false" Priority="22" QFormat="true" Name="Strong"/>
  <w:LsdException Locked="false" Priority="20" QFormat="true" Name="Emphasis"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="Document Map"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="Plain Text"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="E-mail Signature"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="HTML Top of Form"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="HTML Bottom of Form"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="Normal (Web)"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="HTML Acronym"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="HTML Address"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="HTML Cite"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="HTML Code"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="HTML Definition"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="HTML Keyboard"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="HTML Preformatted"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="HTML Sample"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="HTML Typewriter"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="HTML Variable"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="Normal Table"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="annotation subject"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="No List"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="Outline List 1"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="Outline List 2"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="Outline List 3"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="Table Simple 1"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="Table Simple 2"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="Table Simple 3"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="Table Classic 1"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="Table Classic 2"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="Table Classic 3"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="Table Classic 4"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="Table Colorful 1"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="Table Colorful 2"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="Table Colorful 3"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="Table Columns 1"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="Table Columns 2"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="Table Columns 3"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="Table Columns 4"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="Table Columns 5"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="Table Grid 1"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="Table Grid 2"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="Table Grid 3"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="Table Grid 4"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="Table Grid 5"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="Table Grid 6"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="Table Grid 7"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="Table Grid 8"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="Table List 1"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="Table List 2"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="Table List 3"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="Table List 4"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="Table List 5"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="Table List 6"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="Table List 7"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="Table List 8"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="Table 3D effects 1"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="Table 3D effects 2"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="Table 3D effects 3"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="Table Contemporary"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="Table Elegant"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="Table Professional"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="Table Subtle 1"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="Table Subtle 2"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="Table Web 1"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="Table Web 2"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="Table Web 3"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="Balloon Text"/>
  <w:LsdException Locked="false" Priority="39" Name="Table Grid"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="Table Theme"/>
  <w:LsdException Locked="false" SemiHidden="true" Name="Placeholder Text"/>
  <w:LsdException Locked="false" Priority="1" QFormat="true" Name="No Spacing"/>
  <w:LsdException Locked="false" Priority="60" Name="Light Shading"/>
  <w:LsdException Locked="false" Priority="61" Name="Light List"/>
  <w:LsdException Locked="false" Priority="62" Name="Light Grid"/>
  <w:LsdException Locked="false" Priority="63" Name="Medium Shading 1"/>
  <w:LsdException Locked="false" Priority="64" Name="Medium Shading 2"/>
  <w:LsdException Locked="false" Priority="65" Name="Medium List 1"/>
  <w:LsdException Locked="false" Priority="66" Name="Medium List 2"/>
  <w:LsdException Locked="false" Priority="67" Name="Medium Grid 1"/>
  <w:LsdException Locked="false" Priority="68" Name="Medium Grid 2"/>
  <w:LsdException Locked="false" Priority="69" Name="Medium Grid 3"/>
  <w:LsdException Locked="false" Priority="70" Name="Dark List"/>
  <w:LsdException Locked="false" Priority="71" Name="Colorful Shading"/>
  <w:LsdException Locked="false" Priority="72" Name="Colorful List"/>
  <w:LsdException Locked="false" Priority="73" Name="Colorful Grid"/>
  <w:LsdException Locked="false" Priority="60" Name="Light Shading Accent 1"/>
  <w:LsdException Locked="false" Priority="61" Name="Light List Accent 1"/>
  <w:LsdException Locked="false" Priority="62" Name="Light Grid Accent 1"/>
  <w:LsdException Locked="false" Priority="63" Name="Medium Shading 1 Accent 1"/>
  <w:LsdException Locked="false" Priority="64" Name="Medium Shading 2 Accent 1"/>
  <w:LsdException Locked="false" Priority="65" Name="Medium List 1 Accent 1"/>
  <w:LsdException Locked="false" SemiHidden="true" Name="Revision"/>
  <w:LsdException Locked="false" Priority="34" QFormat="true"
   Name="List Paragraph"/>
  <w:LsdException Locked="false" Priority="29" QFormat="true" Name="Quote"/>
  <w:LsdException Locked="false" Priority="30" QFormat="true"
   Name="Intense Quote"/>
  <w:LsdException Locked="false" Priority="66" Name="Medium List 2 Accent 1"/>
  <w:LsdException Locked="false" Priority="67" Name="Medium Grid 1 Accent 1"/>
  <w:LsdException Locked="false" Priority="68" Name="Medium Grid 2 Accent 1"/>
  <w:LsdException Locked="false" Priority="69" Name="Medium Grid 3 Accent 1"/>
  <w:LsdException Locked="false" Priority="70" Name="Dark List Accent 1"/>
  <w:LsdException Locked="false" Priority="71" Name="Colorful Shading Accent 1"/>
  <w:LsdException Locked="false" Priority="72" Name="Colorful List Accent 1"/>
  <w:LsdException Locked="false" Priority="73" Name="Colorful Grid Accent 1"/>
  <w:LsdException Locked="false" Priority="60" Name="Light Shading Accent 2"/>
  <w:LsdException Locked="false" Priority="61" Name="Light List Accent 2"/>
  <w:LsdException Locked="false" Priority="62" Name="Light Grid Accent 2"/>
  <w:LsdException Locked="false" Priority="63" Name="Medium Shading 1 Accent 2"/>
  <w:LsdException Locked="false" Priority="64" Name="Medium Shading 2 Accent 2"/>
  <w:LsdException Locked="false" Priority="65" Name="Medium List 1 Accent 2"/>
  <w:LsdException Locked="false" Priority="66" Name="Medium List 2 Accent 2"/>
  <w:LsdException Locked="false" Priority="67" Name="Medium Grid 1 Accent 2"/>
  <w:LsdException Locked="false" Priority="68" Name="Medium Grid 2 Accent 2"/>
  <w:LsdException Locked="false" Priority="69" Name="Medium Grid 3 Accent 2"/>
  <w:LsdException Locked="false" Priority="70" Name="Dark List Accent 2"/>
  <w:LsdException Locked="false" Priority="71" Name="Colorful Shading Accent 2"/>
  <w:LsdException Locked="false" Priority="72" Name="Colorful List Accent 2"/>
  <w:LsdException Locked="false" Priority="73" Name="Colorful Grid Accent 2"/>
  <w:LsdException Locked="false" Priority="60" Name="Light Shading Accent 3"/>
  <w:LsdException Locked="false" Priority="61" Name="Light List Accent 3"/>
  <w:LsdException Locked="false" Priority="62" Name="Light Grid Accent 3"/>
  <w:LsdException Locked="false" Priority="63" Name="Medium Shading 1 Accent 3"/>
  <w:LsdException Locked="false" Priority="64" Name="Medium Shading 2 Accent 3"/>
  <w:LsdException Locked="false" Priority="65" Name="Medium List 1 Accent 3"/>
  <w:LsdException Locked="false" Priority="66" Name="Medium List 2 Accent 3"/>
  <w:LsdException Locked="false" Priority="67" Name="Medium Grid 1 Accent 3"/>
  <w:LsdException Locked="false" Priority="68" Name="Medium Grid 2 Accent 3"/>
  <w:LsdException Locked="false" Priority="69" Name="Medium Grid 3 Accent 3"/>
  <w:LsdException Locked="false" Priority="70" Name="Dark List Accent 3"/>
  <w:LsdException Locked="false" Priority="71" Name="Colorful Shading Accent 3"/>
  <w:LsdException Locked="false" Priority="72" Name="Colorful List Accent 3"/>
  <w:LsdException Locked="false" Priority="73" Name="Colorful Grid Accent 3"/>
  <w:LsdException Locked="false" Priority="60" Name="Light Shading Accent 4"/>
  <w:LsdException Locked="false" Priority="61" Name="Light List Accent 4"/>
  <w:LsdException Locked="false" Priority="62" Name="Light Grid Accent 4"/>
  <w:LsdException Locked="false" Priority="63" Name="Medium Shading 1 Accent 4"/>
  <w:LsdException Locked="false" Priority="64" Name="Medium Shading 2 Accent 4"/>
  <w:LsdException Locked="false" Priority="65" Name="Medium List 1 Accent 4"/>
  <w:LsdException Locked="false" Priority="66" Name="Medium List 2 Accent 4"/>
  <w:LsdException Locked="false" Priority="67" Name="Medium Grid 1 Accent 4"/>
  <w:LsdException Locked="false" Priority="68" Name="Medium Grid 2 Accent 4"/>
  <w:LsdException Locked="false" Priority="69" Name="Medium Grid 3 Accent 4"/>
  <w:LsdException Locked="false" Priority="70" Name="Dark List Accent 4"/>
  <w:LsdException Locked="false" Priority="71" Name="Colorful Shading Accent 4"/>
  <w:LsdException Locked="false" Priority="72" Name="Colorful List Accent 4"/>
  <w:LsdException Locked="false" Priority="73" Name="Colorful Grid Accent 4"/>
  <w:LsdException Locked="false" Priority="60" Name="Light Shading Accent 5"/>
  <w:LsdException Locked="false" Priority="61" Name="Light List Accent 5"/>
  <w:LsdException Locked="false" Priority="62" Name="Light Grid Accent 5"/>
  <w:LsdException Locked="false" Priority="63" Name="Medium Shading 1 Accent 5"/>
  <w:LsdException Locked="false" Priority="64" Name="Medium Shading 2 Accent 5"/>
  <w:LsdException Locked="false" Priority="65" Name="Medium List 1 Accent 5"/>
  <w:LsdException Locked="false" Priority="66" Name="Medium List 2 Accent 5"/>
  <w:LsdException Locked="false" Priority="67" Name="Medium Grid 1 Accent 5"/>
  <w:LsdException Locked="false" Priority="68" Name="Medium Grid 2 Accent 5"/>
  <w:LsdException Locked="false" Priority="69" Name="Medium Grid 3 Accent 5"/>
  <w:LsdException Locked="false" Priority="70" Name="Dark List Accent 5"/>
  <w:LsdException Locked="false" Priority="71" Name="Colorful Shading Accent 5"/>
  <w:LsdException Locked="false" Priority="72" Name="Colorful List Accent 5"/>
  <w:LsdException Locked="false" Priority="73" Name="Colorful Grid Accent 5"/>
  <w:LsdException Locked="false" Priority="60" Name="Light Shading Accent 6"/>
  <w:LsdException Locked="false" Priority="61" Name="Light List Accent 6"/>
  <w:LsdException Locked="false" Priority="62" Name="Light Grid Accent 6"/>
  <w:LsdException Locked="false" Priority="63" Name="Medium Shading 1 Accent 6"/>
  <w:LsdException Locked="false" Priority="64" Name="Medium Shading 2 Accent 6"/>
  <w:LsdException Locked="false" Priority="65" Name="Medium List 1 Accent 6"/>
  <w:LsdException Locked="false" Priority="66" Name="Medium List 2 Accent 6"/>
  <w:LsdException Locked="false" Priority="67" Name="Medium Grid 1 Accent 6"/>
  <w:LsdException Locked="false" Priority="68" Name="Medium Grid 2 Accent 6"/>
  <w:LsdException Locked="false" Priority="69" Name="Medium Grid 3 Accent 6"/>
  <w:LsdException Locked="false" Priority="70" Name="Dark List Accent 6"/>
  <w:LsdException Locked="false" Priority="71" Name="Colorful Shading Accent 6"/>
  <w:LsdException Locked="false" Priority="72" Name="Colorful List Accent 6"/>
  <w:LsdException Locked="false" Priority="73" Name="Colorful Grid Accent 6"/>
  <w:LsdException Locked="false" Priority="19" QFormat="true"
   Name="Subtle Emphasis"/>
  <w:LsdException Locked="false" Priority="21" QFormat="true"
   Name="Intense Emphasis"/>
  <w:LsdException Locked="false" Priority="31" QFormat="true"
   Name="Subtle Reference"/>
  <w:LsdException Locked="false" Priority="32" QFormat="true"
   Name="Intense Reference"/>
  <w:LsdException Locked="false" Priority="33" QFormat="true" Name="Book Title"/>
  <w:LsdException Locked="false" Priority="37" SemiHidden="true"
   UnhideWhenUsed="true" Name="Bibliography"/>
  <w:LsdException Locked="false" Priority="39" SemiHidden="true"
   UnhideWhenUsed="true" QFormat="true" Name="TOC Heading"/>
  <w:LsdException Locked="false" Priority="41" Name="Plain Table 1"/>
  <w:LsdException Locked="false" Priority="42" Name="Plain Table 2"/>
  <w:LsdException Locked="false" Priority="43" Name="Plain Table 3"/>
  <w:LsdException Locked="false" Priority="44" Name="Plain Table 4"/>
  <w:LsdException Locked="false" Priority="45" Name="Plain Table 5"/>
  <w:LsdException Locked="false" Priority="40" Name="Grid Table Light"/>
  <w:LsdException Locked="false" Priority="46" Name="Grid Table 1 Light"/>
  <w:LsdException Locked="false" Priority="47" Name="Grid Table 2"/>
  <w:LsdException Locked="false" Priority="48" Name="Grid Table 3"/>
  <w:LsdException Locked="false" Priority="49" Name="Grid Table 4"/>
  <w:LsdException Locked="false" Priority="50" Name="Grid Table 5 Dark"/>
  <w:LsdException Locked="false" Priority="51" Name="Grid Table 6 Colorful"/>
  <w:LsdException Locked="false" Priority="52" Name="Grid Table 7 Colorful"/>
  <w:LsdException Locked="false" Priority="46"
   Name="Grid Table 1 Light Accent 1"/>
  <w:LsdException Locked="false" Priority="47" Name="Grid Table 2 Accent 1"/>
  <w:LsdException Locked="false" Priority="48" Name="Grid Table 3 Accent 1"/>
  <w:LsdException Locked="false" Priority="49" Name="Grid Table 4 Accent 1"/>
  <w:LsdException Locked="false" Priority="50" Name="Grid Table 5 Dark Accent 1"/>
  <w:LsdException Locked="false" Priority="51"
   Name="Grid Table 6 Colorful Accent 1"/>
  <w:LsdException Locked="false" Priority="52"
   Name="Grid Table 7 Colorful Accent 1"/>
  <w:LsdException Locked="false" Priority="46"
   Name="Grid Table 1 Light Accent 2"/>
  <w:LsdException Locked="false" Priority="47" Name="Grid Table 2 Accent 2"/>
  <w:LsdException Locked="false" Priority="48" Name="Grid Table 3 Accent 2"/>
  <w:LsdException Locked="false" Priority="49" Name="Grid Table 4 Accent 2"/>
  <w:LsdException Locked="false" Priority="50" Name="Grid Table 5 Dark Accent 2"/>
  <w:LsdException Locked="false" Priority="51"
   Name="Grid Table 6 Colorful Accent 2"/>
  <w:LsdException Locked="false" Priority="52"
   Name="Grid Table 7 Colorful Accent 2"/>
  <w:LsdException Locked="false" Priority="46"
   Name="Grid Table 1 Light Accent 3"/>
  <w:LsdException Locked="false" Priority="47" Name="Grid Table 2 Accent 3"/>
  <w:LsdException Locked="false" Priority="48" Name="Grid Table 3 Accent 3"/>
  <w:LsdException Locked="false" Priority="49" Name="Grid Table 4 Accent 3"/>
  <w:LsdException Locked="false" Priority="50" Name="Grid Table 5 Dark Accent 3"/>
  <w:LsdException Locked="false" Priority="51"
   Name="Grid Table 6 Colorful Accent 3"/>
  <w:LsdException Locked="false" Priority="52"
   Name="Grid Table 7 Colorful Accent 3"/>
  <w:LsdException Locked="false" Priority="46"
   Name="Grid Table 1 Light Accent 4"/>
  <w:LsdException Locked="false" Priority="47" Name="Grid Table 2 Accent 4"/>
  <w:LsdException Locked="false" Priority="48" Name="Grid Table 3 Accent 4"/>
  <w:LsdException Locked="false" Priority="49" Name="Grid Table 4 Accent 4"/>
  <w:LsdException Locked="false" Priority="50" Name="Grid Table 5 Dark Accent 4"/>
  <w:LsdException Locked="false" Priority="51"
   Name="Grid Table 6 Colorful Accent 4"/>
  <w:LsdException Locked="false" Priority="52"
   Name="Grid Table 7 Colorful Accent 4"/>
  <w:LsdException Locked="false" Priority="46"
   Name="Grid Table 1 Light Accent 5"/>
  <w:LsdException Locked="false" Priority="47" Name="Grid Table 2 Accent 5"/>
  <w:LsdException Locked="false" Priority="48" Name="Grid Table 3 Accent 5"/>
  <w:LsdException Locked="false" Priority="49" Name="Grid Table 4 Accent 5"/>
  <w:LsdException Locked="false" Priority="50" Name="Grid Table 5 Dark Accent 5"/>
  <w:LsdException Locked="false" Priority="51"
   Name="Grid Table 6 Colorful Accent 5"/>
  <w:LsdException Locked="false" Priority="52"
   Name="Grid Table 7 Colorful Accent 5"/>
  <w:LsdException Locked="false" Priority="46"
   Name="Grid Table 1 Light Accent 6"/>
  <w:LsdException Locked="false" Priority="47" Name="Grid Table 2 Accent 6"/>
  <w:LsdException Locked="false" Priority="48" Name="Grid Table 3 Accent 6"/>
  <w:LsdException Locked="false" Priority="49" Name="Grid Table 4 Accent 6"/>
  <w:LsdException Locked="false" Priority="50" Name="Grid Table 5 Dark Accent 6"/>
  <w:LsdException Locked="false" Priority="51"
   Name="Grid Table 6 Colorful Accent 6"/>
  <w:LsdException Locked="false" Priority="52"
   Name="Grid Table 7 Colorful Accent 6"/>
  <w:LsdException Locked="false" Priority="46" Name="List Table 1 Light"/>
  <w:LsdException Locked="false" Priority="47" Name="List Table 2"/>
  <w:LsdException Locked="false" Priority="48" Name="List Table 3"/>
  <w:LsdException Locked="false" Priority="49" Name="List Table 4"/>
  <w:LsdException Locked="false" Priority="50" Name="List Table 5 Dark"/>
  <w:LsdException Locked="false" Priority="51" Name="List Table 6 Colorful"/>
  <w:LsdException Locked="false" Priority="52" Name="List Table 7 Colorful"/>
  <w:LsdException Locked="false" Priority="46"
   Name="List Table 1 Light Accent 1"/>
  <w:LsdException Locked="false" Priority="47" Name="List Table 2 Accent 1"/>
  <w:LsdException Locked="false" Priority="48" Name="List Table 3 Accent 1"/>
  <w:LsdException Locked="false" Priority="49" Name="List Table 4 Accent 1"/>
  <w:LsdException Locked="false" Priority="50" Name="List Table 5 Dark Accent 1"/>
  <w:LsdException Locked="false" Priority="51"
   Name="List Table 6 Colorful Accent 1"/>
  <w:LsdException Locked="false" Priority="52"
   Name="List Table 7 Colorful Accent 1"/>
  <w:LsdException Locked="false" Priority="46"
   Name="List Table 1 Light Accent 2"/>
  <w:LsdException Locked="false" Priority="47" Name="List Table 2 Accent 2"/>
  <w:LsdException Locked="false" Priority="48" Name="List Table 3 Accent 2"/>
  <w:LsdException Locked="false" Priority="49" Name="List Table 4 Accent 2"/>
  <w:LsdException Locked="false" Priority="50" Name="List Table 5 Dark Accent 2"/>
  <w:LsdException Locked="false" Priority="51"
   Name="List Table 6 Colorful Accent 2"/>
  <w:LsdException Locked="false" Priority="52"
   Name="List Table 7 Colorful Accent 2"/>
  <w:LsdException Locked="false" Priority="46"
   Name="List Table 1 Light Accent 3"/>
  <w:LsdException Locked="false" Priority="47" Name="List Table 2 Accent 3"/>
  <w:LsdException Locked="false" Priority="48" Name="List Table 3 Accent 3"/>
  <w:LsdException Locked="false" Priority="49" Name="List Table 4 Accent 3"/>
  <w:LsdException Locked="false" Priority="50" Name="List Table 5 Dark Accent 3"/>
  <w:LsdException Locked="false" Priority="51"
   Name="List Table 6 Colorful Accent 3"/>
  <w:LsdException Locked="false" Priority="52"
   Name="List Table 7 Colorful Accent 3"/>
  <w:LsdException Locked="false" Priority="46"
   Name="List Table 1 Light Accent 4"/>
  <w:LsdException Locked="false" Priority="47" Name="List Table 2 Accent 4"/>
  <w:LsdException Locked="false" Priority="48" Name="List Table 3 Accent 4"/>
  <w:LsdException Locked="false" Priority="49" Name="List Table 4 Accent 4"/>
  <w:LsdException Locked="false" Priority="50" Name="List Table 5 Dark Accent 4"/>
  <w:LsdException Locked="false" Priority="51"
   Name="List Table 6 Colorful Accent 4"/>
  <w:LsdException Locked="false" Priority="52"
   Name="List Table 7 Colorful Accent 4"/>
  <w:LsdException Locked="false" Priority="46"
   Name="List Table 1 Light Accent 5"/>
  <w:LsdException Locked="false" Priority="47" Name="List Table 2 Accent 5"/>
  <w:LsdException Locked="false" Priority="48" Name="List Table 3 Accent 5"/>
  <w:LsdException Locked="false" Priority="49" Name="List Table 4 Accent 5"/>
  <w:LsdException Locked="false" Priority="50" Name="List Table 5 Dark Accent 5"/>
  <w:LsdException Locked="false" Priority="51"
   Name="List Table 6 Colorful Accent 5"/>
  <w:LsdException Locked="false" Priority="52"
   Name="List Table 7 Colorful Accent 5"/>
  <w:LsdException Locked="false" Priority="46"
   Name="List Table 1 Light Accent 6"/>
  <w:LsdException Locked="false" Priority="47" Name="List Table 2 Accent 6"/>
  <w:LsdException Locked="false" Priority="48" Name="List Table 3 Accent 6"/>
  <w:LsdException Locked="false" Priority="49" Name="List Table 4 Accent 6"/>
  <w:LsdException Locked="false" Priority="50" Name="List Table 5 Dark Accent 6"/>
  <w:LsdException Locked="false" Priority="51"
   Name="List Table 6 Colorful Accent 6"/>
  <w:LsdException Locked="false" Priority="52"
   Name="List Table 7 Colorful Accent 6"/>
 </w:LatentStyles>
</xml><![endif]-->
<style>
<!--
 /* Font Definitions */
 @font-face
	{font-family:"Cambria Math";
	panose-1:2 4 5 3 5 4 6 3 2 4;
	mso-font-charset:204;
	mso-generic-font-family:roman;
	mso-font-pitch:variable;
	mso-font-signature:-536869121 1107305727 33554432 0 415 0;}
@font-face
	{font-family:"Noto Sans Symbols";
	mso-font-alt:"Times New Roman";
	mso-font-charset:0;
	mso-generic-font-family:auto;
	mso-font-pitch:auto;
	mso-font-signature:0 0 0 0 0 0;}
 /* Style Definitions */
 p.MsoNormal, li.MsoNormal, div.MsoNormal
	{mso-style-unhide:no;
	mso-style-parent:"";
	margin:0cm;
	margin-bottom:.0001pt;
	line-height:115%;
	mso-pagination:widow-orphan;
	font-size:11.0pt;
	font-family:"Arial",sans-serif;
	mso-fareast-font-family:Arial;
	mso-ansi-language:#0019;}
h1
	{mso-style-unhide:no;
	mso-style-next:Обычный;
	margin-top:20.0pt;
	margin-right:0cm;
	margin-bottom:6.0pt;
	margin-left:0cm;
	line-height:115%;
	mso-pagination:widow-orphan lines-together;
	page-break-after:avoid;
	mso-outline-level:1;
	font-size:20.0pt;
	font-family:"Arial",sans-serif;
	mso-font-kerning:0pt;
	mso-ansi-language:#0019;
	font-weight:normal;}
h2
	{mso-style-unhide:no;
	mso-style-next:Обычный;
	margin-top:18.0pt;
	margin-right:0cm;
	margin-bottom:6.0pt;
	margin-left:0cm;
	line-height:115%;
	mso-pagination:widow-orphan lines-together;
	page-break-after:avoid;
	mso-outline-level:2;
	font-size:16.0pt;
	font-family:"Arial",sans-serif;
	mso-ansi-language:#0019;
	font-weight:normal;}
h3
	{mso-style-unhide:no;
	mso-style-next:Обычный;
	margin-top:16.0pt;
	margin-right:0cm;
	margin-bottom:4.0pt;
	margin-left:0cm;
	line-height:115%;
	mso-pagination:widow-orphan lines-together;
	page-break-after:avoid;
	mso-outline-level:3;
	font-size:14.0pt;
	font-family:"Arial",sans-serif;
	color:#434343;
	mso-ansi-language:#0019;
	font-weight:normal;}
h4
	{mso-style-unhide:no;
	mso-style-next:Обычный;
	margin-top:14.0pt;
	margin-right:0cm;
	margin-bottom:4.0pt;
	margin-left:0cm;
	line-height:115%;
	mso-pagination:widow-orphan lines-together;
	page-break-after:avoid;
	mso-outline-level:4;
	font-size:12.0pt;
	font-family:"Arial",sans-serif;
	color:#666666;
	mso-ansi-language:#0019;
	font-weight:normal;}
h5
	{mso-style-unhide:no;
	mso-style-next:Обычный;
	margin-top:12.0pt;
	margin-right:0cm;
	margin-bottom:4.0pt;
	margin-left:0cm;
	line-height:115%;
	mso-pagination:widow-orphan lines-together;
	page-break-after:avoid;
	mso-outline-level:5;
	font-size:11.0pt;
	font-family:"Arial",sans-serif;
	color:#666666;
	mso-ansi-language:#0019;
	font-weight:normal;}
h6
	{mso-style-unhide:no;
	mso-style-next:Обычный;
	margin-top:12.0pt;
	margin-right:0cm;
	margin-bottom:4.0pt;
	margin-left:0cm;
	line-height:115%;
	mso-pagination:widow-orphan lines-together;
	page-break-after:avoid;
	mso-outline-level:6;
	font-size:11.0pt;
	font-family:"Arial",sans-serif;
	color:#666666;
	mso-ansi-language:#0019;
	font-weight:normal;
	font-style:italic;
	mso-bidi-font-style:normal;}
p.MsoTitle, li.MsoTitle, div.MsoTitle
	{mso-style-unhide:no;
	mso-style-next:Обычный;
	margin-top:0cm;
	margin-right:0cm;
	margin-bottom:3.0pt;
	margin-left:0cm;
	line-height:115%;
	mso-pagination:widow-orphan lines-together;
	page-break-after:avoid;
	font-size:26.0pt;
	font-family:"Arial",sans-serif;
	mso-fareast-font-family:Arial;
	mso-ansi-language:#0019;}
p.MsoSubtitle, li.MsoSubtitle, div.MsoSubtitle
	{mso-style-unhide:no;
	mso-style-next:Обычный;
	margin-top:0cm;
	margin-right:0cm;
	margin-bottom:16.0pt;
	margin-left:0cm;
	line-height:115%;
	mso-pagination:widow-orphan lines-together;
	page-break-after:avoid;
	font-size:15.0pt;
	font-family:"Arial",sans-serif;
	mso-fareast-font-family:Arial;
	color:#666666;
	mso-ansi-language:#0019;}
span.SpellE
	{mso-style-name:"";
	mso-spl-e:yes;}
span.GramE
	{mso-style-name:"";
	mso-gram-e:yes;}
.MsoChpDefault
	{mso-style-type:export-only;
	mso-default-props:yes;
	font-family:"Arial",sans-serif;
	mso-ascii-font-family:Arial;
	mso-fareast-font-family:Arial;
	mso-hansi-font-family:Arial;
	mso-bidi-font-family:Arial;
	mso-ansi-language:#0019;}
.MsoPapDefault
	{mso-style-type:export-only;
	line-height:115%;}
@page WordSection1
	{size:595.45pt 841.7pt;
	margin:72.0pt 72.0pt 72.0pt 72.0pt;
	mso-header-margin:36.0pt;
	mso-footer-margin:36.0pt;
	mso-page-numbers:1;
	mso-paper-source:0;}
div.WordSection1
	{page:WordSection1;}
 /* List Definitions */
 @list l0
	{mso-list-id:281304231;
	mso-list-template-ids:-1883077846;}
@list l0:level1
	{mso-level-number-format:bullet;
	mso-level-text:\25CF;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-18.0pt;
	mso-ascii-font-family:"Noto Sans Symbols";
	mso-fareast-font-family:"Noto Sans Symbols";
	mso-hansi-font-family:"Noto Sans Symbols";
	mso-bidi-font-family:"Noto Sans Symbols";}
@list l0:level2
	{mso-level-number-format:bullet;
	mso-level-text:o;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-18.0pt;
	mso-ascii-font-family:"Courier New";
	mso-fareast-font-family:"Courier New";
	mso-hansi-font-family:"Courier New";
	mso-bidi-font-family:"Courier New";}
@list l0:level3
	{mso-level-number-format:bullet;
	mso-level-text:\25AA;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-18.0pt;
	mso-ascii-font-family:"Noto Sans Symbols";
	mso-fareast-font-family:"Noto Sans Symbols";
	mso-hansi-font-family:"Noto Sans Symbols";
	mso-bidi-font-family:"Noto Sans Symbols";}
@list l0:level4
	{mso-level-number-format:bullet;
	mso-level-text:\25CF;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-18.0pt;
	mso-ascii-font-family:"Noto Sans Symbols";
	mso-fareast-font-family:"Noto Sans Symbols";
	mso-hansi-font-family:"Noto Sans Symbols";
	mso-bidi-font-family:"Noto Sans Symbols";}
@list l0:level5
	{mso-level-number-format:bullet;
	mso-level-text:o;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-18.0pt;
	mso-ascii-font-family:"Courier New";
	mso-fareast-font-family:"Courier New";
	mso-hansi-font-family:"Courier New";
	mso-bidi-font-family:"Courier New";}
@list l0:level6
	{mso-level-number-format:bullet;
	mso-level-text:\25AA;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-18.0pt;
	mso-ascii-font-family:"Noto Sans Symbols";
	mso-fareast-font-family:"Noto Sans Symbols";
	mso-hansi-font-family:"Noto Sans Symbols";
	mso-bidi-font-family:"Noto Sans Symbols";}
@list l0:level7
	{mso-level-number-format:bullet;
	mso-level-text:\25CF;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-18.0pt;
	mso-ascii-font-family:"Noto Sans Symbols";
	mso-fareast-font-family:"Noto Sans Symbols";
	mso-hansi-font-family:"Noto Sans Symbols";
	mso-bidi-font-family:"Noto Sans Symbols";}
@list l0:level8
	{mso-level-number-format:bullet;
	mso-level-text:o;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-18.0pt;
	mso-ascii-font-family:"Courier New";
	mso-fareast-font-family:"Courier New";
	mso-hansi-font-family:"Courier New";
	mso-bidi-font-family:"Courier New";}
@list l0:level9
	{mso-level-number-format:bullet;
	mso-level-text:\25AA;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-18.0pt;
	mso-ascii-font-family:"Noto Sans Symbols";
	mso-fareast-font-family:"Noto Sans Symbols";
	mso-hansi-font-family:"Noto Sans Symbols";
	mso-bidi-font-family:"Noto Sans Symbols";}
@list l1
	{mso-list-id:357585771;
	mso-list-template-ids:-752960404;}
@list l1:level1
	{mso-level-number-format:bullet;
	mso-level-text:\2714;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-18.0pt;
	mso-ascii-font-family:"Noto Sans Symbols";
	mso-fareast-font-family:"Noto Sans Symbols";
	mso-hansi-font-family:"Noto Sans Symbols";
	mso-bidi-font-family:"Noto Sans Symbols";}
@list l1:level2
	{mso-level-number-format:bullet;
	mso-level-text:o;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-18.0pt;
	mso-ascii-font-family:"Courier New";
	mso-fareast-font-family:"Courier New";
	mso-hansi-font-family:"Courier New";
	mso-bidi-font-family:"Courier New";}
@list l1:level3
	{mso-level-number-format:bullet;
	mso-level-text:\25AA;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-18.0pt;
	mso-ascii-font-family:"Noto Sans Symbols";
	mso-fareast-font-family:"Noto Sans Symbols";
	mso-hansi-font-family:"Noto Sans Symbols";
	mso-bidi-font-family:"Noto Sans Symbols";}
@list l1:level4
	{mso-level-number-format:bullet;
	mso-level-text:\25CF;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-18.0pt;
	mso-ascii-font-family:"Noto Sans Symbols";
	mso-fareast-font-family:"Noto Sans Symbols";
	mso-hansi-font-family:"Noto Sans Symbols";
	mso-bidi-font-family:"Noto Sans Symbols";}
@list l1:level5
	{mso-level-number-format:bullet;
	mso-level-text:o;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-18.0pt;
	mso-ascii-font-family:"Courier New";
	mso-fareast-font-family:"Courier New";
	mso-hansi-font-family:"Courier New";
	mso-bidi-font-family:"Courier New";}
@list l1:level6
	{mso-level-number-format:bullet;
	mso-level-text:\25AA;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-18.0pt;
	mso-ascii-font-family:"Noto Sans Symbols";
	mso-fareast-font-family:"Noto Sans Symbols";
	mso-hansi-font-family:"Noto Sans Symbols";
	mso-bidi-font-family:"Noto Sans Symbols";}
@list l1:level7
	{mso-level-number-format:bullet;
	mso-level-text:\25CF;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-18.0pt;
	mso-ascii-font-family:"Noto Sans Symbols";
	mso-fareast-font-family:"Noto Sans Symbols";
	mso-hansi-font-family:"Noto Sans Symbols";
	mso-bidi-font-family:"Noto Sans Symbols";}
@list l1:level8
	{mso-level-number-format:bullet;
	mso-level-text:o;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-18.0pt;
	mso-ascii-font-family:"Courier New";
	mso-fareast-font-family:"Courier New";
	mso-hansi-font-family:"Courier New";
	mso-bidi-font-family:"Courier New";}
@list l1:level9
	{mso-level-number-format:bullet;
	mso-level-text:\25AA;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-18.0pt;
	mso-ascii-font-family:"Noto Sans Symbols";
	mso-fareast-font-family:"Noto Sans Symbols";
	mso-hansi-font-family:"Noto Sans Symbols";
	mso-bidi-font-family:"Noto Sans Symbols";}
@list l2
	{mso-list-id:473136135;
	mso-list-template-ids:-561865882;}
@list l2:level1
	{mso-level-number-format:bullet;
	mso-level-text:\25CF;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-18.0pt;
	mso-ascii-font-family:"Noto Sans Symbols";
	mso-fareast-font-family:"Noto Sans Symbols";
	mso-hansi-font-family:"Noto Sans Symbols";
	mso-bidi-font-family:"Noto Sans Symbols";}
@list l2:level2
	{mso-level-number-format:bullet;
	mso-level-text:o;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-18.0pt;
	mso-ascii-font-family:"Courier New";
	mso-fareast-font-family:"Courier New";
	mso-hansi-font-family:"Courier New";
	mso-bidi-font-family:"Courier New";}
@list l2:level3
	{mso-level-number-format:bullet;
	mso-level-text:\25AA;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-18.0pt;
	mso-ascii-font-family:"Noto Sans Symbols";
	mso-fareast-font-family:"Noto Sans Symbols";
	mso-hansi-font-family:"Noto Sans Symbols";
	mso-bidi-font-family:"Noto Sans Symbols";}
@list l2:level4
	{mso-level-number-format:bullet;
	mso-level-text:\25CF;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-18.0pt;
	mso-ascii-font-family:"Noto Sans Symbols";
	mso-fareast-font-family:"Noto Sans Symbols";
	mso-hansi-font-family:"Noto Sans Symbols";
	mso-bidi-font-family:"Noto Sans Symbols";}
@list l2:level5
	{mso-level-number-format:bullet;
	mso-level-text:o;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-18.0pt;
	mso-ascii-font-family:"Courier New";
	mso-fareast-font-family:"Courier New";
	mso-hansi-font-family:"Courier New";
	mso-bidi-font-family:"Courier New";}
@list l2:level6
	{mso-level-number-format:bullet;
	mso-level-text:\25AA;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-18.0pt;
	mso-ascii-font-family:"Noto Sans Symbols";
	mso-fareast-font-family:"Noto Sans Symbols";
	mso-hansi-font-family:"Noto Sans Symbols";
	mso-bidi-font-family:"Noto Sans Symbols";}
@list l2:level7
	{mso-level-number-format:bullet;
	mso-level-text:\25CF;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-18.0pt;
	mso-ascii-font-family:"Noto Sans Symbols";
	mso-fareast-font-family:"Noto Sans Symbols";
	mso-hansi-font-family:"Noto Sans Symbols";
	mso-bidi-font-family:"Noto Sans Symbols";}
@list l2:level8
	{mso-level-number-format:bullet;
	mso-level-text:o;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-18.0pt;
	mso-ascii-font-family:"Courier New";
	mso-fareast-font-family:"Courier New";
	mso-hansi-font-family:"Courier New";
	mso-bidi-font-family:"Courier New";}
@list l2:level9
	{mso-level-number-format:bullet;
	mso-level-text:\25AA;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-18.0pt;
	mso-ascii-font-family:"Noto Sans Symbols";
	mso-fareast-font-family:"Noto Sans Symbols";
	mso-hansi-font-family:"Noto Sans Symbols";
	mso-bidi-font-family:"Noto Sans Symbols";}
@list l3
	{mso-list-id:616983066;
	mso-list-template-ids:2062301692;}
@list l3:level1
	{mso-level-number-format:bullet;
	mso-level-text:\25CF;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-18.0pt;
	mso-ascii-font-family:"Noto Sans Symbols";
	mso-fareast-font-family:"Noto Sans Symbols";
	mso-hansi-font-family:"Noto Sans Symbols";
	mso-bidi-font-family:"Noto Sans Symbols";}
@list l3:level2
	{mso-level-number-format:bullet;
	mso-level-text:o;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-18.0pt;
	mso-ascii-font-family:"Courier New";
	mso-fareast-font-family:"Courier New";
	mso-hansi-font-family:"Courier New";
	mso-bidi-font-family:"Courier New";}
@list l3:level3
	{mso-level-number-format:bullet;
	mso-level-text:\25AA;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-18.0pt;
	mso-ascii-font-family:"Noto Sans Symbols";
	mso-fareast-font-family:"Noto Sans Symbols";
	mso-hansi-font-family:"Noto Sans Symbols";
	mso-bidi-font-family:"Noto Sans Symbols";}
@list l3:level4
	{mso-level-number-format:bullet;
	mso-level-text:\25CF;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-18.0pt;
	mso-ascii-font-family:"Noto Sans Symbols";
	mso-fareast-font-family:"Noto Sans Symbols";
	mso-hansi-font-family:"Noto Sans Symbols";
	mso-bidi-font-family:"Noto Sans Symbols";}
@list l3:level5
	{mso-level-number-format:bullet;
	mso-level-text:o;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-18.0pt;
	mso-ascii-font-family:"Courier New";
	mso-fareast-font-family:"Courier New";
	mso-hansi-font-family:"Courier New";
	mso-bidi-font-family:"Courier New";}
@list l3:level6
	{mso-level-number-format:bullet;
	mso-level-text:\25AA;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-18.0pt;
	mso-ascii-font-family:"Noto Sans Symbols";
	mso-fareast-font-family:"Noto Sans Symbols";
	mso-hansi-font-family:"Noto Sans Symbols";
	mso-bidi-font-family:"Noto Sans Symbols";}
@list l3:level7
	{mso-level-number-format:bullet;
	mso-level-text:\25CF;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-18.0pt;
	mso-ascii-font-family:"Noto Sans Symbols";
	mso-fareast-font-family:"Noto Sans Symbols";
	mso-hansi-font-family:"Noto Sans Symbols";
	mso-bidi-font-family:"Noto Sans Symbols";}
@list l3:level8
	{mso-level-number-format:bullet;
	mso-level-text:o;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-18.0pt;
	mso-ascii-font-family:"Courier New";
	mso-fareast-font-family:"Courier New";
	mso-hansi-font-family:"Courier New";
	mso-bidi-font-family:"Courier New";}
@list l3:level9
	{mso-level-number-format:bullet;
	mso-level-text:\25AA;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-18.0pt;
	mso-ascii-font-family:"Noto Sans Symbols";
	mso-fareast-font-family:"Noto Sans Symbols";
	mso-hansi-font-family:"Noto Sans Symbols";
	mso-bidi-font-family:"Noto Sans Symbols";}
@list l4
	{mso-list-id:949698147;
	mso-list-template-ids:1438647900;}
@list l4:level1
	{mso-level-number-format:bullet;
	mso-level-text:\25CF;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-18.0pt;
	mso-ascii-font-family:"Noto Sans Symbols";
	mso-fareast-font-family:"Noto Sans Symbols";
	mso-hansi-font-family:"Noto Sans Symbols";
	mso-bidi-font-family:"Noto Sans Symbols";}
@list l4:level2
	{mso-level-number-format:bullet;
	mso-level-text:o;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-18.0pt;
	mso-ascii-font-family:"Courier New";
	mso-fareast-font-family:"Courier New";
	mso-hansi-font-family:"Courier New";
	mso-bidi-font-family:"Courier New";}
@list l4:level3
	{mso-level-number-format:bullet;
	mso-level-text:\25AA;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-18.0pt;
	mso-ascii-font-family:"Noto Sans Symbols";
	mso-fareast-font-family:"Noto Sans Symbols";
	mso-hansi-font-family:"Noto Sans Symbols";
	mso-bidi-font-family:"Noto Sans Symbols";}
@list l4:level4
	{mso-level-number-format:bullet;
	mso-level-text:\25CF;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-18.0pt;
	mso-ascii-font-family:"Noto Sans Symbols";
	mso-fareast-font-family:"Noto Sans Symbols";
	mso-hansi-font-family:"Noto Sans Symbols";
	mso-bidi-font-family:"Noto Sans Symbols";}
@list l4:level5
	{mso-level-number-format:bullet;
	mso-level-text:o;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-18.0pt;
	mso-ascii-font-family:"Courier New";
	mso-fareast-font-family:"Courier New";
	mso-hansi-font-family:"Courier New";
	mso-bidi-font-family:"Courier New";}
@list l4:level6
	{mso-level-number-format:bullet;
	mso-level-text:\25AA;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-18.0pt;
	mso-ascii-font-family:"Noto Sans Symbols";
	mso-fareast-font-family:"Noto Sans Symbols";
	mso-hansi-font-family:"Noto Sans Symbols";
	mso-bidi-font-family:"Noto Sans Symbols";}
@list l4:level7
	{mso-level-number-format:bullet;
	mso-level-text:\25CF;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-18.0pt;
	mso-ascii-font-family:"Noto Sans Symbols";
	mso-fareast-font-family:"Noto Sans Symbols";
	mso-hansi-font-family:"Noto Sans Symbols";
	mso-bidi-font-family:"Noto Sans Symbols";}
@list l4:level8
	{mso-level-number-format:bullet;
	mso-level-text:o;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-18.0pt;
	mso-ascii-font-family:"Courier New";
	mso-fareast-font-family:"Courier New";
	mso-hansi-font-family:"Courier New";
	mso-bidi-font-family:"Courier New";}
@list l4:level9
	{mso-level-number-format:bullet;
	mso-level-text:\25AA;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-18.0pt;
	mso-ascii-font-family:"Noto Sans Symbols";
	mso-fareast-font-family:"Noto Sans Symbols";
	mso-hansi-font-family:"Noto Sans Symbols";
	mso-bidi-font-family:"Noto Sans Symbols";}
@list l5
	{mso-list-id:1990329436;
	mso-list-template-ids:-397888096;}
@list l5:level1
	{mso-level-number-format:bullet;
	mso-level-text:\25CF;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-18.0pt;
	mso-ascii-font-family:"Noto Sans Symbols";
	mso-fareast-font-family:"Noto Sans Symbols";
	mso-hansi-font-family:"Noto Sans Symbols";
	mso-bidi-font-family:"Noto Sans Symbols";}
@list l5:level2
	{mso-level-number-format:bullet;
	mso-level-text:o;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-18.0pt;
	mso-ascii-font-family:"Courier New";
	mso-fareast-font-family:"Courier New";
	mso-hansi-font-family:"Courier New";
	mso-bidi-font-family:"Courier New";}
@list l5:level3
	{mso-level-number-format:bullet;
	mso-level-text:\25AA;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-18.0pt;
	mso-ascii-font-family:"Noto Sans Symbols";
	mso-fareast-font-family:"Noto Sans Symbols";
	mso-hansi-font-family:"Noto Sans Symbols";
	mso-bidi-font-family:"Noto Sans Symbols";}
@list l5:level4
	{mso-level-number-format:bullet;
	mso-level-text:\25CF;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-18.0pt;
	mso-ascii-font-family:"Noto Sans Symbols";
	mso-fareast-font-family:"Noto Sans Symbols";
	mso-hansi-font-family:"Noto Sans Symbols";
	mso-bidi-font-family:"Noto Sans Symbols";}
@list l5:level5
	{mso-level-number-format:bullet;
	mso-level-text:o;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-18.0pt;
	mso-ascii-font-family:"Courier New";
	mso-fareast-font-family:"Courier New";
	mso-hansi-font-family:"Courier New";
	mso-bidi-font-family:"Courier New";}
@list l5:level6
	{mso-level-number-format:bullet;
	mso-level-text:\25AA;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-18.0pt;
	mso-ascii-font-family:"Noto Sans Symbols";
	mso-fareast-font-family:"Noto Sans Symbols";
	mso-hansi-font-family:"Noto Sans Symbols";
	mso-bidi-font-family:"Noto Sans Symbols";}
@list l5:level7
	{mso-level-number-format:bullet;
	mso-level-text:\25CF;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-18.0pt;
	mso-ascii-font-family:"Noto Sans Symbols";
	mso-fareast-font-family:"Noto Sans Symbols";
	mso-hansi-font-family:"Noto Sans Symbols";
	mso-bidi-font-family:"Noto Sans Symbols";}
@list l5:level8
	{mso-level-number-format:bullet;
	mso-level-text:o;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-18.0pt;
	mso-ascii-font-family:"Courier New";
	mso-fareast-font-family:"Courier New";
	mso-hansi-font-family:"Courier New";
	mso-bidi-font-family:"Courier New";}
@list l5:level9
	{mso-level-number-format:bullet;
	mso-level-text:\25AA;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-18.0pt;
	mso-ascii-font-family:"Noto Sans Symbols";
	mso-fareast-font-family:"Noto Sans Symbols";
	mso-hansi-font-family:"Noto Sans Symbols";
	mso-bidi-font-family:"Noto Sans Symbols";}
@list l6
	{mso-list-id:2073503183;
	mso-list-template-ids:1476193042;}
@list l6:level1
	{mso-level-number-format:bullet;
	mso-level-text:\25CF;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:54.0pt;
	text-indent:-18.0pt;
	mso-ascii-font-family:"Noto Sans Symbols";
	mso-fareast-font-family:"Noto Sans Symbols";
	mso-hansi-font-family:"Noto Sans Symbols";
	mso-bidi-font-family:"Noto Sans Symbols";}
@list l6:level2
	{mso-level-number-format:bullet;
	mso-level-text:o;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:90.0pt;
	text-indent:-18.0pt;
	mso-ascii-font-family:"Courier New";
	mso-fareast-font-family:"Courier New";
	mso-hansi-font-family:"Courier New";
	mso-bidi-font-family:"Courier New";}
@list l6:level3
	{mso-level-number-format:bullet;
	mso-level-text:\25AA;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:126.0pt;
	text-indent:-18.0pt;
	mso-ascii-font-family:"Noto Sans Symbols";
	mso-fareast-font-family:"Noto Sans Symbols";
	mso-hansi-font-family:"Noto Sans Symbols";
	mso-bidi-font-family:"Noto Sans Symbols";}
@list l6:level4
	{mso-level-number-format:bullet;
	mso-level-text:\25CF;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:162.0pt;
	text-indent:-18.0pt;
	mso-ascii-font-family:"Noto Sans Symbols";
	mso-fareast-font-family:"Noto Sans Symbols";
	mso-hansi-font-family:"Noto Sans Symbols";
	mso-bidi-font-family:"Noto Sans Symbols";}
@list l6:level5
	{mso-level-number-format:bullet;
	mso-level-text:o;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:198.0pt;
	text-indent:-18.0pt;
	mso-ascii-font-family:"Courier New";
	mso-fareast-font-family:"Courier New";
	mso-hansi-font-family:"Courier New";
	mso-bidi-font-family:"Courier New";}
@list l6:level6
	{mso-level-number-format:bullet;
	mso-level-text:\25AA;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:234.0pt;
	text-indent:-18.0pt;
	mso-ascii-font-family:"Noto Sans Symbols";
	mso-fareast-font-family:"Noto Sans Symbols";
	mso-hansi-font-family:"Noto Sans Symbols";
	mso-bidi-font-family:"Noto Sans Symbols";}
@list l6:level7
	{mso-level-number-format:bullet;
	mso-level-text:\25CF;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:270.0pt;
	text-indent:-18.0pt;
	mso-ascii-font-family:"Noto Sans Symbols";
	mso-fareast-font-family:"Noto Sans Symbols";
	mso-hansi-font-family:"Noto Sans Symbols";
	mso-bidi-font-family:"Noto Sans Symbols";}
@list l6:level8
	{mso-level-number-format:bullet;
	mso-level-text:o;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:306.0pt;
	text-indent:-18.0pt;
	mso-ascii-font-family:"Courier New";
	mso-fareast-font-family:"Courier New";
	mso-hansi-font-family:"Courier New";
	mso-bidi-font-family:"Courier New";}
@list l6:level9
	{mso-level-number-format:bullet;
	mso-level-text:\25AA;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	margin-left:342.0pt;
	text-indent:-18.0pt;
	mso-ascii-font-family:"Noto Sans Symbols";
	mso-fareast-font-family:"Noto Sans Symbols";
	mso-hansi-font-family:"Noto Sans Symbols";
	mso-bidi-font-family:"Noto Sans Symbols";}
ol
	{margin-bottom:0cm;}
ul
	{margin-bottom:0cm;}
-->
</style>
<!--[if gte mso 10]>
<style>
 /* Style Definitions */
 table.MsoNormalTable
	{mso-style-name:"Обычная таблица";
	mso-tstyle-rowband-size:0;
	mso-tstyle-colband-size:0;
	mso-style-noshow:yes;
	mso-style-priority:99;
	mso-style-parent:"";
	mso-padding-alt:0cm 5.4pt 0cm 5.4pt;
	mso-para-margin:0cm;
	mso-para-margin-bottom:.0001pt;
	line-height:115%;
	mso-pagination:widow-orphan;
	font-size:11.0pt;
	font-family:"Arial",sans-serif;
	mso-ansi-language:#0019;}
table.TableNormal
	{mso-style-name:"Table Normal";
	mso-tstyle-rowband-size:0;
	mso-tstyle-colband-size:0;
	mso-style-unhide:no;
	mso-style-parent:"";
	mso-padding-alt:0cm 0cm 0cm 0cm;
	mso-para-margin:0cm;
	mso-para-margin-bottom:.0001pt;
	line-height:115%;
	mso-pagination:widow-orphan;
	font-size:11.0pt;
	font-family:"Arial",sans-serif;
	mso-ansi-language:#0019;}
</style>
<![endif]--><!--[if gte mso 9]><xml>
 <o:shapedefaults v:ext="edit" spidmax="1026"/>
</xml><![endif]--><!--[if gte mso 9]><xml>
 <o:shapelayout v:ext="edit">
  <o:idmap v:ext="edit" data="1"/>
 </o:shapelayout></xml><![endif]-->
</head>

<body lang=RU style='tab-interval:36.0pt'>

<div class=WordSection1>

<p class=MsoNormal style='margin-top:12.0pt;margin-right:0cm;margin-bottom:
12.0pt;margin-left:0cm;text-align:justify;line-height:150%'><b
style='mso-bidi-font-weight:normal'><span lang=ru style='font-size:14.0pt;
line-height:150%;font-family:"Times New Roman",serif;mso-fareast-font-family:
"Times New Roman";color:#4F81BD'>Карельские базы отдыха на берегу<o:p></o:p></span></b></p>

<p class=MsoNormal style='margin-top:12.0pt;margin-right:0cm;margin-bottom:
12.0pt;margin-left:0cm;text-align:justify;line-height:150%'><span lang=ru
style='font-size:12.0pt;line-height:150%;font-family:"Times New Roman",serif;
mso-fareast-font-family:"Times New Roman"'>Карелия – республика с
многочисленными голубыми озерами среди первозданных лесов. Особенно их много,
крупных и совсем крошечных, на севере, в бассейне Белого моря. Умеренный климат
– теплые зимы и нежаркое лето, красота природы, озера, богатые рыбой, базы отдыха
вдали от городской суеты и промышленных центров притягивают сюда миллионы
туристов. Крупные комфортабельные отели, маленькие базы отдыха без особого
изыска – любой вид отдыха востребован и имеет своих почитателей.<o:p></o:p></span></p>

<p class=MsoNormal style='margin-top:12.0pt;margin-right:0cm;margin-bottom:
12.0pt;margin-left:0cm;text-align:justify;line-height:150%'><span
style='font-size:12.0pt;line-height:150%;font-family:"Times New Roman",serif;
mso-fareast-font-family:"Times New Roman";mso-ansi-language:RU;mso-no-proof:
yes'><!--[if gte vml 1]><v:shapetype id="_x0000_t75" coordsize="21600,21600"
 o:spt="75" o:preferrelative="t" path="m@4@5l@4@11@9@11@9@5xe" filled="f"
 stroked="f">
 <v:stroke joinstyle="miter"/>
 <v:formulas>
  <v:f eqn="if lineDrawn pixelLineWidth 0"/>
  <v:f eqn="sum @0 1 0"/>
  <v:f eqn="sum 0 0 @1"/>
  <v:f eqn="prod @2 1 2"/>
  <v:f eqn="prod @3 21600 pixelWidth"/>
  <v:f eqn="prod @3 21600 pixelHeight"/>
  <v:f eqn="sum @0 0 1"/>
  <v:f eqn="prod @6 1 2"/>
  <v:f eqn="prod @7 21600 pixelWidth"/>
  <v:f eqn="sum @8 21600 0"/>
  <v:f eqn="prod @7 21600 pixelHeight"/>
  <v:f eqn="sum @10 21600 0"/>
 </v:formulas>
 <v:path o:extrusionok="f" gradientshapeok="t" o:connecttype="rect"/>
 <o:lock v:ext="edit" aspectratio="t"/>
</v:shapetype><v:shape id="image1.jpg" o:spid="_x0000_i1029" type="#_x0000_t75"
 style='width:451.2pt;height:300.6pt;visibility:visible;mso-wrap-style:square'>
 <v:imagedata src="1%20Карельские%20базы%20отдыха%20на%20берегу%20(с%20картинками).files/image001.jpg"
  o:title="Банный чан на базе в Карелии"/>
</v:shape><![endif]--><![if !vml]><img width=602 height=401
src="1%20Карельские%20базы%20отдыха%20на%20берегу%20(с%20картинками).files/image002.jpg"
v:shapes="image1.jpg"><![endif]></span><span lang=ru style='font-size:12.0pt;
line-height:150%;font-family:"Times New Roman",serif;mso-fareast-font-family:
"Times New Roman"'><o:p></o:p></span></p>

<h3 style='margin-top:10.0pt;margin-right:0cm;margin-bottom:12.0pt;margin-left:
0cm;text-align:justify;line-height:150%'><b style='mso-bidi-font-weight:normal'><span
lang=ru style='font-size:12.0pt;line-height:150%;font-family:"Times New Roman",serif;
mso-fareast-font-family:"Times New Roman";color:#4F81BD'>База отдыха в Карелии
с чаном и баней<o:p></o:p></span></b></h3>

<p class=MsoNormal style='margin-top:12.0pt;margin-right:0cm;margin-bottom:
12.0pt;margin-left:0cm;text-align:justify;line-height:150%'><span lang=ru
style='font-size:12.0pt;line-height:150%;font-family:"Times New Roman",serif;
mso-fareast-font-family:"Times New Roman"'>Сказочная Карелия начинается с
банного чана. Это чудо сравнивают с геотермальной ванной, его еще называют «<span
class=SpellE>молодильным</span> чаном». Это самый шикарный вид отдыха, который
предлагает Карелия.<o:p></o:p></span></p>

<p class=MsoNormal style='margin-top:12.0pt;margin-right:0cm;margin-bottom:
12.0pt;margin-left:0cm;text-align:justify;line-height:150%'><span lang=ru
style='font-size:12.0pt;line-height:150%;font-family:"Times New Roman",serif;
mso-fareast-font-family:"Times New Roman"'>Сибирский банный чан совмещает в
себе возможность охладиться и согреться, попариться. Он похож на парилку в
русской бане, но имеет некоторые отличия и преимущества. Тепло в чане
распределяется <span class=GramE>снизу вверх</span>, прогревается равномерно,
при этом сохраняя голову на свежем воздухе. Процедура укрепляет иммунитет,
восстанавливает силы, повышает настроение. <o:p></o:p></span></p>

<p class=MsoNormal style='margin-top:12.0pt;margin-right:0cm;margin-bottom:
12.0pt;margin-left:0cm;text-align:justify;line-height:150%'><span
style='font-size:12.0pt;line-height:150%;font-family:"Times New Roman",serif;
mso-fareast-font-family:"Times New Roman";mso-ansi-language:RU;mso-no-proof:
yes'><!--[if gte vml 1]><v:shape id="image4.jpg" o:spid="_x0000_i1028" type="#_x0000_t75"
 style='width:451.2pt;height:301.2pt;visibility:visible;mso-wrap-style:square'>
 <v:imagedata src="1%20Карельские%20базы%20отдыха%20на%20берегу%20(с%20картинками).files/image003.jpg"
  o:title="Отдых в Карелии"/>
</v:shape><![endif]--><![if !vml]><img width=602 height=402
src="1%20Карельские%20базы%20отдыха%20на%20берегу%20(с%20картинками).files/image004.jpg"
v:shapes="image4.jpg"><![endif]></span><span lang=ru style='font-size:12.0pt;
line-height:150%;font-family:"Times New Roman",serif;mso-fareast-font-family:
"Times New Roman"'><o:p></o:p></span></p>

<p class=MsoNormal style='margin-top:12.0pt;margin-right:0cm;margin-bottom:
12.0pt;margin-left:0cm;text-align:justify;line-height:150%'><span lang=ru
style='font-size:12.0pt;line-height:150%;font-family:"Times New Roman",serif;
mso-fareast-font-family:"Times New Roman"'>Одна из таких купелей установлена
под открытым небом на террасе коттеджа </span><span style='font-size:12.0pt;
line-height:150%;font-family:"Times New Roman",serif;mso-fareast-font-family:
"Times New Roman";mso-ansi-language:RU'>дома</span><span lang=ru
style='font-size:12.0pt;line-height:150%;font-family:"Times New Roman",serif;
mso-fareast-font-family:"Times New Roman"'> отдыха </span><span lang=ru><a
href="https://sonniyzaliv.ru/lunniy-zaliv"><span style='font-size:12.0pt;
line-height:150%;font-family:"Times New Roman",serif;mso-fareast-font-family:
"Times New Roman";color:#1155CC'>«Лунный залив».</span></a></span><span
lang=ru style='font-size:12.0pt;line-height:150%;font-family:"Times New Roman",serif;
mso-fareast-font-family:"Times New Roman"'> Вода в </span><span
style='font-size:12.0pt;line-height:150%;font-family:"Times New Roman",serif;
mso-fareast-font-family:"Times New Roman";mso-ansi-language:RU'>ней</span><span
lang=ru style='font-size:12.0pt;line-height:150%;font-family:"Times New Roman",serif;
mso-fareast-font-family:"Times New Roman"'> нагревается до </span><span
style='font-size:12.0pt;line-height:150%;font-family:"Times New Roman",serif;
mso-fareast-font-family:"Times New Roman";mso-ansi-language:RU'>35</span><span
lang=ru style='font-size:12.0pt;line-height:150%;font-family:"Times New Roman",serif;
mso-fareast-font-family:"Times New Roman"'> градусов. Жарко будет даже в мороз.
<o:p></o:p></span></p>

<p class=MsoNormal style='margin-top:12.0pt;margin-right:0cm;margin-bottom:
12.0pt;margin-left:0cm;text-align:justify;line-height:150%'><span lang=ru
style='font-size:12.0pt;line-height:150%;font-family:"Times New Roman",serif;
mso-fareast-font-family:"Times New Roman"'>База предлагает в аренду
благоустроенные номера площадью 42 м<sup>2</sup> с двуспальной кроватью. <o:p></o:p></span></p>

<p class=MsoNormal style='margin-top:12.0pt;margin-right:0cm;margin-bottom:
12.0pt;margin-left:0cm;text-align:justify;line-height:150%'><span lang=ru
style='font-size:12.0pt;line-height:150%;font-family:"Times New Roman",serif;
mso-fareast-font-family:"Times New Roman"'>Аренда номера на двоих без питания –
6 470 р.<o:p></o:p></span></p>

<p class=MsoNormal style='margin-top:12.0pt;margin-right:0cm;margin-bottom:
12.0pt;margin-left:0cm;text-align:justify;line-height:150%'><span lang=ru
style='font-size:12.0pt;line-height:150%;font-family:"Times New Roman",serif;
mso-fareast-font-family:"Times New Roman"'>Собственная ванная комната,
бесплатный <span class=SpellE>Wi-fi</span>, кондиционер, спутниковое
телевидение, терраса. В ванной комнате душевая кабина, стиральная машина. Есть
электроплита и посуда, принадлежности для барбекю.<o:p></o:p></span></p>

<p class=MsoNormal style='margin-top:12.0pt;margin-right:0cm;margin-bottom:
12.0pt;margin-left:0cm;text-align:justify;line-height:150%'><span lang=ru
style='font-size:12.0pt;line-height:150%;font-family:"Times New Roman",serif;
mso-fareast-font-family:"Times New Roman"'>База отдыха </span><span lang=ru><a
href="https://sonniyzaliv.ru/lunniy-zaliv"><span style='font-size:12.0pt;
line-height:150%;font-family:"Times New Roman",serif;mso-fareast-font-family:
"Times New Roman";color:#1155CC'>«Сонный залив»</span></a></span><span lang=ru
style='font-size:12.0pt;line-height:150%;font-family:"Times New Roman",serif;
mso-fareast-font-family:"Times New Roman"'> в Сортавале тоже предлагает сауну с
купелью. Дома расположены на берегу озера в Ладожских шхерах, в 10 минутах от
туристического центра Сортавала.<o:p></o:p></span></p>

<p class=MsoNormal style='margin-top:12.0pt;margin-right:0cm;margin-bottom:
12.0pt;margin-left:0cm;text-align:justify;line-height:150%'><span lang=ru
style='font-size:12.0pt;line-height:150%;font-family:"Times New Roman",serif;
mso-fareast-font-family:"Times New Roman"'>Аренда номера для 4 гостей без
питания – 8 830 р. в сутки. Сауна и купель с фильтрацией оплачиваются отдельно
– от 2 500 р.<o:p></o:p></span></p>

<p class=MsoNormal style='margin-top:12.0pt;margin-right:0cm;margin-bottom:
12.0pt;margin-left:0cm;text-align:justify;line-height:150%'><span lang=ru
style='font-size:12.0pt;line-height:150%;font-family:"Times New Roman",serif;
mso-fareast-font-family:"Times New Roman"'>Есть причал, пирс и пристань, пляж,
предлагается аренд лодки. Есть возможность взять гида по Валааму, прогулку на
катере по Ладожским шхерам, на остров Валаам.<o:p></o:p></span></p>

<p class=MsoNormal style='margin-top:12.0pt;margin-right:0cm;margin-bottom:
12.0pt;margin-left:0cm;text-align:justify;line-height:150%'><span lang=ru
style='font-size:12.0pt;line-height:150%;font-family:"Times New Roman",serif;
mso-fareast-font-family:"Times New Roman"'>Едут сюда для смены обстановки,
перезагрузки, снятия усталости. <o:p></o:p></span></p>

<p class=MsoNormal style='margin-top:12.0pt;margin-right:0cm;margin-bottom:
12.0pt;margin-left:0cm;text-align:justify;line-height:150%'><span lang=ru
style='font-size:12.0pt;line-height:150%;font-family:"Times New Roman",serif;
mso-fareast-font-family:"Times New Roman"'>Комфортабельный коттедж с
удобствами, рыбалка прямо у дома, дровяная баня с террасой, банным чаном
премиум класса – отличный отдых от городской суеты. Лежать в горячей воде под
открытым небом, ловить снежинки, любоваться на звезды – что может быть лучше
для души и тела.<span style='mso-spacerun:yes'>   </span><o:p></o:p></span></p>

<p class=MsoNormal style='margin-top:12.0pt;margin-right:0cm;margin-bottom:
12.0pt;margin-left:0cm;text-align:justify;line-height:150%'><b
style='mso-bidi-font-weight:normal'><span lang=ru style='font-size:12.0pt;
line-height:150%;font-family:"Times New Roman",serif;mso-fareast-font-family:
"Times New Roman";color:#4F81BD'>База отдыха в Сортавале на берегу озера<o:p></o:p></span></b></p>

<p class=MsoNormal style='margin-top:12.0pt;margin-right:0cm;margin-bottom:
12.0pt;margin-left:0cm;text-align:justify;line-height:150%'><span lang=ru
style='font-size:12.0pt;line-height:150%;font-family:"Times New Roman",serif;
mso-fareast-font-family:"Times New Roman"'>База отдыха</span><span lang=ru><a
href="https://sonniyzaliv.ru/lunniy-zaliv"><span style='font-size:12.0pt;
line-height:150%;font-family:"Times New Roman",serif;mso-fareast-font-family:
"Times New Roman";color:#1155CC'> «Черная Жемчужина» (Сонный залив) </span></a></span><span
lang=ru style='font-size:12.0pt;line-height:150%;font-family:"Times New Roman",serif;
mso-fareast-font-family:"Times New Roman"'>расположена в поселке <span
class=SpellE>Нукутталахти</span> Сортавальского городского поселения Карелии.
Гостям предлагаются уютные коттеджи, оснащенные всем необходимым для комфорта.
Домики с панорамными окнами на залив стоят на первой линии. Отдыхающие отмечают
изумительно красивые закаты, бездонное звездное небо, вековые сосны, тишину.<o:p></o:p></span></p>

<p class=MsoNormal style='margin-top:12.0pt;margin-right:0cm;margin-bottom:
12.0pt;margin-left:0cm;text-align:justify;line-height:150%'><span
style='font-size:12.0pt;line-height:150%;font-family:"Times New Roman",serif;
mso-fareast-font-family:"Times New Roman";mso-ansi-language:RU;mso-no-proof:
yes'><!--[if gte vml 1]><v:shape id="Рисунок_x0020_6" o:spid="_x0000_i1027"
 type="#_x0000_t75" style='width:451.8pt;height:301.2pt;visibility:visible;
 mso-wrap-style:square'>
 <v:imagedata src="1%20Карельские%20базы%20отдыха%20на%20берегу%20(с%20картинками).files/image005.jpg"
  o:title=""/>
</v:shape><![endif]--><![if !vml]><img border=0 width=602 height=402
src="1%20Карельские%20базы%20отдыха%20на%20берегу%20(с%20картинками).files/image006.jpg"
v:shapes="Рисунок_x0020_6"><![endif]></span><span lang=ru style='font-size:
12.0pt;line-height:150%;font-family:"Times New Roman",serif;mso-fareast-font-family:
"Times New Roman"'><o:p></o:p></span></p>

<p class=MsoNormal style='margin-top:12.0pt;margin-right:0cm;margin-bottom:
12.0pt;margin-left:0cm;text-align:justify;line-height:150%'><span lang=ru
style='font-size:12.0pt;line-height:150%;font-family:"Times New Roman",serif;
mso-fareast-font-family:"Times New Roman"'>На базе можно арендовать уютный
домик на берегу озера:<o:p></o:p></span></p>

<p class=MsoNormal style='margin-top:12.0pt;margin-right:0cm;margin-bottom:
0cm;margin-left:36.0pt;margin-bottom:.0001pt;text-align:justify;text-indent:
-18.0pt;line-height:150%;mso-list:l5 level1 lfo1'><![if !supportLists]><span
lang=ru style='font-size:12.0pt;line-height:150%;font-family:"Noto Sans Symbols";
mso-fareast-font-family:"Noto Sans Symbols";mso-bidi-font-family:"Noto Sans Symbols"'><span
style='mso-list:Ignore'>&#9679;<span style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</span></span></span><![endif]><span lang=ru style='font-size:12.0pt;
line-height:150%;font-family:"Times New Roman",serif;mso-fareast-font-family:
"Times New Roman"'>домик 45 м<sup>2</sup> для двоих гостей – 3 200 в сутки;<o:p></o:p></span></p>

<p class=MsoNormal style='margin-left:36.0pt;text-align:justify;text-indent:
-18.0pt;line-height:150%;mso-list:l5 level1 lfo1'><![if !supportLists]><span
lang=ru style='font-size:12.0pt;line-height:150%;font-family:"Noto Sans Symbols";
mso-fareast-font-family:"Noto Sans Symbols";mso-bidi-font-family:"Noto Sans Symbols"'><span
style='mso-list:Ignore'>&#9679;<span style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</span></span></span><![endif]><span lang=ru style='font-size:12.0pt;
line-height:150%;font-family:"Times New Roman",serif;mso-fareast-font-family:
"Times New Roman"'>дом 80 м<sup>2</sup> с двумя спальнями для четверых – 5 300
р.<o:p></o:p></span></p>

<p class=MsoNormal style='margin-top:0cm;margin-right:0cm;margin-bottom:12.0pt;
margin-left:36.0pt;text-align:justify;text-indent:-18.0pt;line-height:150%;
mso-list:l5 level1 lfo1'><![if !supportLists]><span lang=ru style='font-size:
12.0pt;line-height:150%;font-family:"Noto Sans Symbols";mso-fareast-font-family:
"Noto Sans Symbols";mso-bidi-font-family:"Noto Sans Symbols"'><span
style='mso-list:Ignore'>&#9679;<span style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</span></span></span><![endif]><span lang=ru style='font-size:12.0pt;
line-height:150%;font-family:"Times New Roman",serif;mso-fareast-font-family:
"Times New Roman"'>В наличии подарочные сертификаты по 5 000 р. (дата заезда
открытая);<o:p></o:p></span></p>

<p class=MsoNormal style='margin-top:12.0pt;margin-right:0cm;margin-bottom:
12.0pt;margin-left:0cm;text-align:justify;line-height:150%'><span lang=ru
style='font-size:12.0pt;line-height:150%;font-family:"Times New Roman",serif;
mso-fareast-font-family:"Times New Roman"'>Внутри домиков приятный
минималистический интерьер, посудомойка, стиральная машина. У каждого дома
терраса. Есть <span class=SpellE>Wi-fi</span>. <o:p></o:p></span></p>

<p class=MsoNormal style='margin-top:12.0pt;margin-right:0cm;margin-bottom:
12.0pt;margin-left:0cm;text-align:justify;line-height:150%'><span lang=ru
style='font-size:12.0pt;line-height:150%;font-family:"Times New Roman",serif;
mso-fareast-font-family:"Times New Roman"'>Доступно бронирование, завтраки в
ресторане «<span class=SpellE>Ламберг</span>» (100 м от дома). Работает
доставка продуктов из магазина «Лента». Есть место для шашлыка, решетка,
шампуры прилагаются.<o:p></o:p></span></p>

<p class=MsoNormal style='margin-top:12.0pt;margin-right:0cm;margin-bottom:
12.0pt;margin-left:0cm;text-align:justify;line-height:150%'><span lang=ru
style='font-size:12.0pt;line-height:150%;font-family:"Times New Roman",serif;
mso-fareast-font-family:"Times New Roman"'>Можно арендовать лодку по приемлемой
цене. Рядом клуб, баня и ресторан. Можно сходить на экскурсию в Музей Северного
<span class=SpellE>Приладожья</span>. <o:p></o:p></span></p>

<p class=MsoNormal style='margin-top:12.0pt;margin-right:0cm;margin-bottom:
12.0pt;margin-left:0cm;text-align:justify;line-height:150%'><span lang=ru
style='font-size:12.0pt;line-height:150%;font-family:"Times New Roman",serif;
mso-fareast-font-family:"Times New Roman"'>Бесплатная парковка, до Сортавала
ходит Яндекс-такси. <o:p></o:p></span></p>

<p class=MsoNormal style='margin-top:12.0pt;margin-right:0cm;margin-bottom:
12.0pt;margin-left:0cm;text-align:justify;line-height:150%'><span lang=ru
style='font-size:12.0pt;line-height:150%;font-family:"Times New Roman",serif;
mso-fareast-font-family:"Times New Roman"'>Созданы условия для отдыха с детьми.
В домиках тепло, ванные комнаты оборудованы <span class=SpellE>полотенцесушителем</span>.
На кухне много всякой посуды, стульчик для кормления и горшок. Есть соль, сахар,
крупы, макароны, чай, кофе. Микроволновка, тостер, кофеварка, посудомойка.
Стиральная машина, средство для стирки, гель для душа – мелочи, но приятно,
заезжай и живи. Рейтинг 5 из 5.<o:p></o:p></span></p>

<p class=MsoNormal style='margin-top:12.0pt;margin-right:0cm;margin-bottom:
12.0pt;margin-left:0cm;text-align:justify;line-height:150%'><span lang=ru
style='font-size:12.0pt;line-height:150%;font-family:"Times New Roman",serif;
mso-fareast-font-family:"Times New Roman"'><br>
</span><span lang=ru><a href="https://lamberg-club.ru/"><b style='mso-bidi-font-weight:
normal'><span style='font-size:12.0pt;line-height:150%;font-family:"Times New Roman",serif;
mso-fareast-font-family:"Times New Roman";color:#1155CC'>База отдыха <span
class=SpellE>Ламберг</span> Карелия </span></b></a></span><b style='mso-bidi-font-weight:
normal'><span lang=ru style='font-size:12.0pt;line-height:150%;font-family:
"Times New Roman",serif;mso-fareast-font-family:"Times New Roman";color:#4F81BD'>(официальный
сайт)<o:p></o:p></span></b></p>

<p class=MsoNormal style='margin-top:12.0pt;margin-right:0cm;margin-bottom:
12.0pt;margin-left:0cm;text-align:justify;line-height:150%'><span lang=ru
style='font-size:12.0pt;line-height:150%;font-family:"Times New Roman",serif;
mso-fareast-font-family:"Times New Roman"'>Здесь найдете небольшой комплекс
бревенчатых коттеджей с уютным отелем из 12 номеров. База отдыха 2010 г.
постройки, до г. Сортавала – 5,6 км, международного аэропорта <span
class=SpellE>Бесовец</span> – 246 км.<o:p></o:p></span></p>

<p class=MsoNormal style='margin-top:12.0pt;margin-right:0cm;margin-bottom:
12.0pt;margin-left:0cm;text-align:justify;line-height:150%'><span lang=ru
style='font-size:12.0pt;line-height:150%;font-family:"Times New Roman",serif;
mso-fareast-font-family:"Times New Roman"'>Отель расположен на первой береговой
линии Ладожского озера. Для отдыхающих пирс, песчаный пляж, правда,
необорудованный. <o:p></o:p></span></p>

<p class=MsoNormal style='margin-top:12.0pt;margin-right:0cm;margin-bottom:
12.0pt;margin-left:0cm;text-align:justify;line-height:150%'><span lang=ru
style='font-size:12.0pt;line-height:150%;font-family:"Times New Roman",serif;
mso-fareast-font-family:"Times New Roman"'>На базе имеются конференц-зал,
ресторан с баром, банкетный зал, кафе, магазин сувениров, джакузи, сауна,
паровая баня, парковка. Созданы все условия для семейного отдыха с детьми,
можно заезжать с домашними животными.<o:p></o:p></span></p>

<p class=MsoNormal style='margin-top:12.0pt;margin-right:0cm;margin-bottom:
12.0pt;margin-left:0cm;text-align:justify;line-height:150%'><span lang=ru
style='font-size:12.0pt;line-height:150%;font-family:"Times New Roman",serif;
mso-fareast-font-family:"Times New Roman"'><span
style='mso-spacerun:yes'> </span>Для развлечений предлагается рыбалка, охота,
катание на снегоходах, <span class=SpellE>квадроциклах</span>, <span
class=SpellE>дартс</span>, экскурсии. Есть детская площадка, настольный теннис,
бильярд, аренда велосипедов, прокат горнолыжного снаряжения, аренда яхт и
катеров.<o:p></o:p></span></p>

<p class=MsoNormal style='margin-top:12.0pt;margin-right:0cm;margin-bottom:
0cm;margin-left:36.0pt;margin-bottom:.0001pt;text-align:justify;text-indent:
-18.0pt;line-height:150%;mso-list:l0 level1 lfo4'><![if !supportLists]><span
lang=ru style='font-size:12.0pt;line-height:150%;font-family:"Noto Sans Symbols";
mso-fareast-font-family:"Noto Sans Symbols";mso-bidi-font-family:"Noto Sans Symbols"'><span
style='mso-list:Ignore'>&#9679;<span style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</span></span></span><![endif]><span lang=ru style='font-size:12.0pt;
line-height:150%;font-family:"Times New Roman",serif;mso-fareast-font-family:
"Times New Roman"'>Стандартные номера – от 6 400 р за ночь.<o:p></o:p></span></p>

<p class=MsoNormal style='margin-left:36.0pt;text-align:justify;text-indent:
-18.0pt;line-height:150%;mso-list:l0 level1 lfo4'><![if !supportLists]><span
lang=ru style='font-size:12.0pt;line-height:150%;font-family:"Noto Sans Symbols";
mso-fareast-font-family:"Noto Sans Symbols";mso-bidi-font-family:"Noto Sans Symbols"'><span
style='mso-list:Ignore'>&#9679;<span style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</span></span></span><![endif]><span lang=ru style='font-size:12.0pt;
line-height:150%;font-family:"Times New Roman",serif;mso-fareast-font-family:
"Times New Roman"'>Ванные комнаты с косметическими принадлежностями, детские
кроватки – бесплатно.<o:p></o:p></span></p>

<p class=MsoNormal style='margin-left:36.0pt;text-align:justify;text-indent:
-18.0pt;line-height:150%;mso-list:l0 level1 lfo4'><![if !supportLists]><span
lang=ru style='font-size:12.0pt;line-height:150%;font-family:"Noto Sans Symbols";
mso-fareast-font-family:"Noto Sans Symbols";mso-bidi-font-family:"Noto Sans Symbols"'><span
style='mso-list:Ignore'>&#9679;<span style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</span></span></span><![endif]><span lang=ru style='font-size:12.0pt;
line-height:150%;font-family:"Times New Roman",serif;mso-fareast-font-family:
"Times New Roman"'>Катание на снегоходах – 200 р.<o:p></o:p></span></p>

<p class=MsoNormal style='margin-left:36.0pt;text-align:justify;text-indent:
-18.0pt;line-height:150%;mso-list:l0 level1 lfo4'><![if !supportLists]><span
lang=ru style='font-size:12.0pt;line-height:150%;font-family:"Noto Sans Symbols";
mso-fareast-font-family:"Noto Sans Symbols";mso-bidi-font-family:"Noto Sans Symbols"'><span
style='mso-list:Ignore'>&#9679;<span style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</span></span></span><![endif]><span lang=ru style='font-size:12.0pt;
line-height:150%;font-family:"Times New Roman",serif;mso-fareast-font-family:
"Times New Roman"'>Катание на <span class=SpellE>квадроциклах</span> – 3 600 р.<o:p></o:p></span></p>

<p class=MsoNormal style='margin-left:36.0pt;text-align:justify;text-indent:
-18.0pt;line-height:150%;mso-list:l0 level1 lfo4'><![if !supportLists]><span
lang=ru style='font-size:12.0pt;line-height:150%;font-family:"Noto Sans Symbols";
mso-fareast-font-family:"Noto Sans Symbols";mso-bidi-font-family:"Noto Sans Symbols"'><span
style='mso-list:Ignore'>&#9679;<span style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</span></span></span><![endif]><span lang=ru style='font-size:12.0pt;
line-height:150%;font-family:"Times New Roman",serif;mso-fareast-font-family:
"Times New Roman"'>Летняя рыбалка – от 3 000 р.<o:p></o:p></span></p>

<p class=MsoNormal style='margin-top:0cm;margin-right:0cm;margin-bottom:12.0pt;
margin-left:36.0pt;text-align:justify;text-indent:-18.0pt;line-height:150%;
mso-list:l0 level1 lfo4'><![if !supportLists]><span lang=ru style='font-size:
12.0pt;line-height:150%;font-family:"Noto Sans Symbols";mso-fareast-font-family:
"Noto Sans Symbols";mso-bidi-font-family:"Noto Sans Symbols"'><span
style='mso-list:Ignore'>&#9679;<span style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</span></span></span><![endif]><span lang=ru style='font-size:12.0pt;
line-height:150%;font-family:"Times New Roman",serif;mso-fareast-font-family:
"Times New Roman"'>Охота – от 15 000 р.<o:p></o:p></span></p>

<p class=MsoNormal style='margin-top:12.0pt;margin-right:0cm;margin-bottom:
12.0pt;margin-left:0cm;text-align:justify;line-height:150%'><span lang=ru
style='font-size:12.0pt;line-height:150%;font-family:"Times New Roman",serif;
mso-fareast-font-family:"Times New Roman"'>Отличное место для отдыха в любое
время года. Номера отапливаются, во многих полы с подогревом, санузел, камин,
телевизор, холодильник, кухонный уголок с чайником, мини-баром, сейф в каждом
номере. <o:p></o:p></span></p>

<p class=MsoNormal style='margin-top:12.0pt;margin-right:0cm;margin-bottom:
12.0pt;margin-left:0cm;text-align:justify;line-height:150%'><span lang=ru
style='font-size:12.0pt;line-height:150%;font-family:"Times New Roman",serif;
mso-fareast-font-family:"Times New Roman"'>Очень красивое уединенное место,
присутствует национальный колорит. Оценка – 5 из 5 (480 отзывов).<o:p></o:p></span></p>

<p class=MsoNormal style='margin-top:12.0pt;margin-right:0cm;margin-bottom:
12.0pt;margin-left:0cm;text-align:justify;line-height:150%'><span
style='font-size:12.0pt;line-height:150%;font-family:"Times New Roman",serif;
mso-fareast-font-family:"Times New Roman";mso-ansi-language:RU;mso-no-proof:
yes'><!--[if gte vml 1]><v:shape id="image3.png" o:spid="_x0000_i1026" type="#_x0000_t75"
 style='width:451.2pt;height:331.2pt;visibility:visible;mso-wrap-style:square'>
 <v:imagedata src="1%20Карельские%20базы%20отдыха%20на%20берегу%20(с%20картинками).files/image007.png"
  o:title=""/>
</v:shape><![endif]--><![if !vml]><img border=0 width=602 height=442
src="1%20Карельские%20базы%20отдыха%20на%20берегу%20(с%20картинками).files/image008.gif"
v:shapes="image3.png"><![endif]></span><span lang=ru style='font-size:12.0pt;
line-height:150%;font-family:"Times New Roman",serif;mso-fareast-font-family:
"Times New Roman"'><o:p></o:p></span></p>

<p class=MsoNormal style='margin-top:12.0pt;margin-right:0cm;margin-bottom:
12.0pt;margin-left:0cm;text-align:justify;line-height:150%'><span lang=ru><a
href="https://sortavala-ostrov.ru/"><b style='mso-bidi-font-weight:normal'><span
style='font-size:12.0pt;line-height:150%;font-family:"Times New Roman",serif;
mso-fareast-font-family:"Times New Roman";color:#1155CC'>База отдыха Остров
Карелия</span></b></a></span><span lang=ru style='font-size:12.0pt;line-height:
150%;font-family:"Times New Roman",serif;mso-fareast-font-family:"Times New Roman"'><o:p></o:p></span></p>

<p class=MsoNormal style='margin-top:12.0pt;margin-right:0cm;margin-bottom:
12.0pt;margin-left:0cm;text-align:justify;line-height:150%'><span lang=ru
style='font-size:12.0pt;line-height:150%;font-family:"Times New Roman",serif;
mso-fareast-font-family:"Times New Roman"'>Туристический комплекс расположен на
Острове <span class=SpellE>Риеккалансари</span> под горой <span class=SpellE>Ворсунмяки</span>,
прямо на побережье Ладожского озера, окружен хвойными лесами. Здесь начинаются
Шхеры. Первая линия домов с мансардными окнами позволяет наслаждаться
прекрасными закатами и звездным небом. <o:p></o:p></span></p>

<p class=MsoNormal style='margin-top:12.0pt;margin-right:0cm;margin-bottom:
0cm;margin-left:36.0pt;margin-bottom:.0001pt;text-align:justify;text-indent:
-18.0pt;line-height:150%;mso-list:l4 level1 lfo5'><![if !supportLists]><span
lang=ru style='font-size:12.0pt;line-height:150%;font-family:"Noto Sans Symbols";
mso-fareast-font-family:"Noto Sans Symbols";mso-bidi-font-family:"Noto Sans Symbols"'><span
style='mso-list:Ignore'>&#9679;<span style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</span></span></span><![endif]><span lang=ru style='font-size:12.0pt;
line-height:150%;font-family:"Times New Roman",serif;mso-fareast-font-family:
"Times New Roman"'>2-этажный домик мансардного типа стоит от 5 100 до 8 500 р;<o:p></o:p></span></p>

<p class=MsoNormal style='margin-left:36.0pt;text-align:justify;text-indent:
-18.0pt;line-height:150%;mso-list:l4 level1 lfo5'><![if !supportLists]><span
lang=ru style='font-size:12.0pt;line-height:150%;font-family:"Noto Sans Symbols";
mso-fareast-font-family:"Noto Sans Symbols";mso-bidi-font-family:"Noto Sans Symbols"'><span
style='mso-list:Ignore'>&#9679;<span style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</span></span></span><![endif]><span lang=ru style='font-size:12.0pt;
line-height:150%;font-family:"Times New Roman",serif;mso-fareast-font-family:
"Times New Roman"'>Так же стоит квартира «В гостях у бабы Поли» на ул.
Карельская 50;<o:p></o:p></span></p>

<p class=MsoNormal style='margin-top:0cm;margin-right:0cm;margin-bottom:12.0pt;
margin-left:36.0pt;text-align:justify;text-indent:-18.0pt;line-height:150%;
mso-list:l4 level1 lfo5'><![if !supportLists]><span lang=ru style='font-size:
12.0pt;line-height:150%;font-family:"Noto Sans Symbols";mso-fareast-font-family:
"Noto Sans Symbols";mso-bidi-font-family:"Noto Sans Symbols"'><span
style='mso-list:Ignore'>&#9679;<span style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</span></span></span><![endif]><span lang=ru style='font-size:12.0pt;
line-height:150%;font-family:"Times New Roman",serif;mso-fareast-font-family:
"Times New Roman"'>Коттедж (Дом художника) – 14&nbsp;800 руб. без питания.<o:p></o:p></span></p>

<p class=MsoNormal style='margin-top:12.0pt;margin-right:0cm;margin-bottom:
12.0pt;margin-left:0cm;text-align:justify;line-height:150%'><span lang=ru
style='font-size:12.0pt;line-height:150%;font-family:"Times New Roman",serif;
mso-fareast-font-family:"Times New Roman"'>Возможно проживание с животными,
есть площадки для пикника (одна на два домика), интернет. Дома отапливаются,
оборудованы теплыми полами, камином. Есть отдельный санузел, душ, кухонный
уголок, холодильник, плита. Доставка еды по заказу. <o:p></o:p></span></p>

<p class=MsoNormal style='margin-top:12.0pt;margin-right:0cm;margin-bottom:
12.0pt;margin-left:0cm;text-align:justify;line-height:150%'><span lang=ru
style='font-size:12.0pt;line-height:150%;font-family:"Times New Roman",serif;
mso-fareast-font-family:"Times New Roman"'>В наличии сауна, оздоровительный
центр.<o:p></o:p></span></p>

<p class=MsoNormal style='margin-top:12.0pt;margin-right:0cm;margin-bottom:
12.0pt;margin-left:0cm;text-align:justify;line-height:150%'><span lang=ru
style='font-size:12.0pt;line-height:150%;font-family:"Times New Roman",serif;
mso-fareast-font-family:"Times New Roman"'>Из развлечений предлагается охота,
бильярд, прокат <span class=SpellE>квадроциклов</span>, снегоходов, лодок,
оборудование для водных видов спорта, <span class=SpellE>снорклинг</span>,
виндсерфинг, йога, бадминтон, ферма животных. Можно заняться рыбалкой,
покататься на лыжах, лошадях. <o:p></o:p></span></p>

<p class=MsoNormal style='margin-top:12.0pt;margin-right:0cm;margin-bottom:
12.0pt;margin-left:0cm;text-align:justify;line-height:150%'><span lang=ru
style='font-size:12.0pt;line-height:150%;font-family:"Times New Roman",serif;
mso-fareast-font-family:"Times New Roman"'>Парковка бесплатная. Старинный сад
для прогулок. Можно заказать трансфер из ж/д вокзала, автовокзала.<o:p></o:p></span></p>

<p class=MsoNormal style='margin-top:12.0pt;margin-right:0cm;margin-bottom:
12.0pt;margin-left:0cm;text-align:justify;line-height:150%'><span lang=ru
style='font-size:12.0pt;line-height:150%;font-family:"Times New Roman",serif;
mso-fareast-font-family:"Times New Roman"'>База подходит для семейного отдыха.
Но много отрицательных отзывов. В основном жалуются на отсутствие сервиса, на
несоответствие ожидаемого с реальными условиями проживания.<o:p></o:p></span></p>

<p class=MsoNormal style='margin-top:12.0pt;margin-right:0cm;margin-bottom:
12.0pt;margin-left:0cm;text-align:justify;line-height:150%'><span lang=ru><a
href="https://black-rocks.ru/?utm_source=yandex&amp;utm_medium=cpc&amp;utm_campaign=konkurenty&amp;utm_content=14562482545&amp;utm_term=---autotargeting&amp;yclid=11072789795563372543"><b
style='mso-bidi-font-weight:normal'><span style='font-size:12.0pt;line-height:
150%;font-family:"Times New Roman",serif;mso-fareast-font-family:"Times New Roman";
color:#1155CC'>База отдыха Черные Камни в Карелии</span></b></a></span><b
style='mso-bidi-font-weight:normal'><span lang=ru style='font-size:12.0pt;
line-height:150%;font-family:"Times New Roman",serif;mso-fareast-font-family:
"Times New Roman";color:#4F81BD'> (официальный сайт цены)<o:p></o:p></span></b></p>

<p class=MsoNormal style='margin-top:12.0pt;margin-right:0cm;margin-bottom:
12.0pt;margin-left:0cm;text-align:justify;line-height:150%'><span lang=ru
style='font-size:12.0pt;line-height:150%;font-family:"Times New Roman",serif;
mso-fareast-font-family:"Times New Roman"'>База на берегу озера <span
class=SpellE>Янисъярви</span> (п. <span class=SpellE>Киркколахти</span>) среди
завораживающих лесов <span class=GramE>отличается<span
style='mso-spacerun:yes'>  </span>ухоженной</span> территорией. Озеро
образовалось на месте падения метеорита. К услугам гостей:<o:p></o:p></span></p>

<p class=MsoNormal style='margin-top:12.0pt;margin-right:0cm;margin-bottom:
0cm;margin-left:36.0pt;margin-bottom:.0001pt;text-align:justify;text-indent:
-18.0pt;line-height:150%;mso-list:l1 level1 lfo3'><![if !supportLists]><span
lang=ru style='font-size:12.0pt;line-height:150%;font-family:"Noto Sans Symbols";
mso-fareast-font-family:"Noto Sans Symbols";mso-bidi-font-family:"Noto Sans Symbols"'><span
style='mso-list:Ignore'>&#10004;<span style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;&nbsp;
</span></span></span><![endif]><span lang=ru style='font-size:12.0pt;
line-height:150%;font-family:"Times New Roman",serif;mso-fareast-font-family:
"Times New Roman"'>27 коттеджей комфорт-класса у озера;<o:p></o:p></span></p>

<p class=MsoNormal style='margin-left:36.0pt;text-align:justify;text-indent:
-18.0pt;line-height:150%;mso-list:l1 level1 lfo3'><![if !supportLists]><span
lang=ru style='font-size:12.0pt;line-height:150%;font-family:"Noto Sans Symbols";
mso-fareast-font-family:"Noto Sans Symbols";mso-bidi-font-family:"Noto Sans Symbols"'><span
style='mso-list:Ignore'>&#10004;<span style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;&nbsp;
</span></span></span><![endif]><span lang=ru style='font-size:12.0pt;
line-height:150%;font-family:"Times New Roman",serif;mso-fareast-font-family:
"Times New Roman"'>двухместные номера гостиницы «Атлантика» (территория
Карельского зоопарка и берег озера); <o:p></o:p></span></p>

<p class=MsoNormal style='margin-left:36.0pt;text-align:justify;text-indent:
-18.0pt;line-height:150%;mso-list:l1 level1 lfo3'><![if !supportLists]><span
lang=ru style='font-size:12.0pt;line-height:150%;font-family:"Noto Sans Symbols";
mso-fareast-font-family:"Noto Sans Symbols";mso-bidi-font-family:"Noto Sans Symbols"'><span
style='mso-list:Ignore'>&#10004;<span style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;&nbsp;
</span></span></span><![endif]><span lang=ru style='font-size:12.0pt;
line-height:150%;font-family:"Times New Roman",serif;mso-fareast-font-family:
"Times New Roman"'>панорамный ресторан с карельской кухней;<o:p></o:p></span></p>

<p class=MsoNormal style='margin-left:36.0pt;text-align:justify;text-indent:
-18.0pt;line-height:150%;mso-list:l1 level1 lfo3'><![if !supportLists]><span
lang=ru style='font-size:12.0pt;line-height:150%;font-family:"Noto Sans Symbols";
mso-fareast-font-family:"Noto Sans Symbols";mso-bidi-font-family:"Noto Sans Symbols"'><span
style='mso-list:Ignore'>&#10004;<span style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;&nbsp;
</span></span></span><![endif]><span lang=ru style='font-size:12.0pt;
line-height:150%;font-family:"Times New Roman",serif;mso-fareast-font-family:
"Times New Roman"'>120 метров до Карельского зоопарка, 12 км до Горного парка «<span
class=SpellE>Рускеала</span>»;<o:p></o:p></span></p>

<p class=MsoNormal style='margin-left:36.0pt;text-align:justify;text-indent:
-18.0pt;line-height:150%;mso-list:l1 level1 lfo3'><![if !supportLists]><span
lang=ru style='font-size:12.0pt;line-height:150%;font-family:"Noto Sans Symbols";
mso-fareast-font-family:"Noto Sans Symbols";mso-bidi-font-family:"Noto Sans Symbols"'><span
style='mso-list:Ignore'>&#10004;<span style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;&nbsp;
</span></span></span><![endif]><span lang=ru style='font-size:12.0pt;
line-height:150%;font-family:"Times New Roman",serif;mso-fareast-font-family:
"Times New Roman"'>банные комплексы, бассейн, услуги массажа; <o:p></o:p></span></p>

<p class=MsoNormal style='margin-left:54.0pt;text-align:justify;text-indent:
-18.0pt;line-height:150%;mso-list:l6 level1 lfo7'><![if !supportLists]><span
lang=ru style='font-size:12.0pt;line-height:150%;font-family:"Noto Sans Symbols";
mso-fareast-font-family:"Noto Sans Symbols";mso-bidi-font-family:"Noto Sans Symbols"'><span
style='mso-list:Ignore'>&#9679;<span style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</span></span></span><![endif]><span lang=ru style='font-size:12.0pt;
line-height:150%;font-family:"Times New Roman",serif;mso-fareast-font-family:
"Times New Roman"'>Однокомнатный номер гостиницы «Атлантика» на двоих – 10 тыс.
в сутки; номер <span class=SpellE>делюкс</span> – 13 тыс.; люкс – 15 тыс.<o:p></o:p></span></p>

<p class=MsoNormal style='margin-left:54.0pt;text-align:justify;text-indent:
-18.0pt;line-height:150%;mso-list:l6 level1 lfo7'><![if !supportLists]><span
lang=ru style='font-size:12.0pt;line-height:150%;font-family:"Noto Sans Symbols";
mso-fareast-font-family:"Noto Sans Symbols";mso-bidi-font-family:"Noto Sans Symbols"'><span
style='mso-list:Ignore'>&#9679;<span style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</span></span></span><![endif]><span lang=ru style='font-size:12.0pt;
line-height:150%;font-family:"Times New Roman",serif;mso-fareast-font-family:
"Times New Roman"'>Номер стандарт <span class=SpellE>Экогостиницы</span> можно
забронировать за 7 800 р в сутки; семейный – 15 440 р; семейный люкс – 17 500
р.<o:p></o:p></span></p>

<p class=MsoNormal style='margin-left:54.0pt;text-align:justify;text-indent:
-18.0pt;line-height:150%;mso-list:l6 level1 lfo7'><![if !supportLists]><span
lang=ru style='font-size:12.0pt;line-height:150%;font-family:"Noto Sans Symbols";
mso-fareast-font-family:"Noto Sans Symbols";mso-bidi-font-family:"Noto Sans Symbols"'><span
style='mso-list:Ignore'>&#9679;<span style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</span></span></span><![endif]><span lang=ru style='font-size:12.0pt;
line-height:150%;font-family:"Times New Roman",serif;mso-fareast-font-family:
"Times New Roman"'>Коттеджи: шестиместный – от 32 000 р; <span class=SpellE>делюкс</span>
– 38 400 р; 8-местный – 43 600; <o:p></o:p></span></p>

<p class=MsoNormal style='margin-top:0cm;margin-right:0cm;margin-bottom:12.0pt;
margin-left:54.0pt;text-align:justify;line-height:150%'><span lang=ru
style='font-size:12.0pt;line-height:150%;font-family:"Times New Roman",serif;
mso-fareast-font-family:"Times New Roman"'>6-местный дом рыбака – 44 200; дом
охотника – 51 200; коттедж на воде «Михаил <span class=SpellE>Светлофф</span>»
– 54 000; 10-местный с камином – 59 100, с камином и сауной – 59 100;
12-местный – 67 200; <span class=SpellE>делюкс</span> – 93 600 р; 10-местный
коттедж плюс СПА – 93 600, 14-местный люкс – 107 600 р.<o:p></o:p></span></p>

<p class=MsoNormal style='margin-top:12.0pt;margin-right:0cm;margin-bottom:
12.0pt;margin-left:0cm;text-align:justify;line-height:150%'><span lang=ru
style='font-size:12.0pt;line-height:150%;font-family:"Times New Roman",serif;
mso-fareast-font-family:"Times New Roman"'>Условия предлагаются на разный вкус
и кошелек. Баня и сауна, рыбалка и охота, экскурсии и вылазки в лес, отдых
вдвоем, с детьми и большой компанией – разнообразие отдыха впечатляет. <o:p></o:p></span></p>

<p class=MsoNormal style='margin-top:12.0pt;margin-right:0cm;margin-bottom:
12.0pt;margin-left:0cm;text-align:justify;line-height:150%'><span
style='font-size:12.0pt;line-height:150%;font-family:"Times New Roman",serif;
mso-fareast-font-family:"Times New Roman";mso-ansi-language:RU;mso-no-proof:
yes'><!--[if gte vml 1]><v:shape id="image5.png" o:spid="_x0000_i1025" type="#_x0000_t75"
 style='width:451.2pt;height:300pt;visibility:visible;mso-wrap-style:square'>
 <v:imagedata src="1%20Карельские%20базы%20отдыха%20на%20берегу%20(с%20картинками).files/image009.png"
  o:title=""/>
</v:shape><![endif]--><![if !vml]><img border=0 width=602 height=400
src="1%20Карельские%20базы%20отдыха%20на%20берегу%20(с%20картинками).files/image010.gif"
v:shapes="image5.png"><![endif]></span><span lang=ru style='font-size:12.0pt;
line-height:150%;font-family:"Times New Roman",serif;mso-fareast-font-family:
"Times New Roman"'><o:p></o:p></span></p>

<p class=MsoNormal style='margin-top:12.0pt;margin-right:0cm;margin-bottom:
12.0pt;margin-left:0cm;text-align:justify;line-height:150%'><b
style='mso-bidi-font-weight:normal'><span lang=ru style='font-size:12.0pt;
line-height:150%;font-family:"Times New Roman",serif;mso-fareast-font-family:
"Times New Roman";color:#4F81BD'>Базы отдыха в Сортавале, Карелия<o:p></o:p></span></b></p>

<p class=MsoNormal style='margin-top:12.0pt;margin-right:0cm;margin-bottom:
12.0pt;margin-left:0cm;text-align:justify;line-height:150%'><span lang=ru><a
href="https://tour-arsenal.ru/"><span style='font-size:12.0pt;line-height:150%;
font-family:"Times New Roman",serif;mso-fareast-font-family:"Times New Roman";
color:#1155CC'>База отдыха «Арсенал»</span></a></span><span lang=ru
style='font-size:12.0pt;line-height:150%;font-family:"Times New Roman",serif;
mso-fareast-font-family:"Times New Roman"'> (п. Вяртсиля, 6 км от автодороги на
Суйстамо) расположена в 6 км от центра Сортавале, 150 м от озера <span
class=SpellE>Янисъярви</span>. Кругом первозданная северная природа с вековыми
лесами, 5 км до границы с Финляндией<o:p></o:p></span></p>

<p class=MsoNormal style='margin-top:12.0pt;margin-right:0cm;margin-bottom:
12.0pt;margin-left:0cm;text-align:justify;line-height:150%'><span lang=ru
style='font-size:12.0pt;line-height:150%;font-family:"Times New Roman",serif;
mso-fareast-font-family:"Times New Roman"'>Для отдыха предлагаются деревянные
домики и коттеджи.<o:p></o:p></span></p>

<p class=MsoNormal style='margin-top:12.0pt;margin-right:0cm;margin-bottom:
0cm;margin-left:36.0pt;margin-bottom:.0001pt;text-align:justify;text-indent:
-18.0pt;line-height:150%;mso-list:l3 level1 lfo6'><![if !supportLists]><span
lang=ru style='font-size:12.0pt;line-height:150%;font-family:"Noto Sans Symbols";
mso-fareast-font-family:"Noto Sans Symbols";mso-bidi-font-family:"Noto Sans Symbols"'><span
style='mso-list:Ignore'>&#9679;<span style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</span></span></span><![endif]><span lang=ru style='font-size:12.0pt;
line-height:150%;font-family:"Times New Roman",serif;mso-fareast-font-family:
"Times New Roman"'>Трехместный однокомнатный номер – от 5 000 р (с завтраком);<o:p></o:p></span></p>

<p class=MsoNormal style='margin-left:36.0pt;text-align:justify;text-indent:
-18.0pt;line-height:150%;mso-list:l2 level1 lfo2'><![if !supportLists]><span
lang=ru style='font-size:12.0pt;line-height:150%;font-family:"Noto Sans Symbols";
mso-fareast-font-family:"Noto Sans Symbols";mso-bidi-font-family:"Noto Sans Symbols"'><span
style='mso-list:Ignore'>&#9679;<span style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</span></span></span><![endif]><span lang=ru style='font-size:12.0pt;
line-height:150%;font-family:"Times New Roman",serif;mso-fareast-font-family:
"Times New Roman"'>3-комнатный номер на 4 чел. – от 7 500 р;<o:p></o:p></span></p>

<p class=MsoNormal style='margin-top:0cm;margin-right:0cm;margin-bottom:12.0pt;
margin-left:36.0pt;text-align:justify;text-indent:-18.0pt;line-height:150%;
mso-list:l2 level1 lfo2'><![if !supportLists]><span lang=ru style='font-size:
12.0pt;line-height:150%;font-family:"Noto Sans Symbols";mso-fareast-font-family:
"Noto Sans Symbols";mso-bidi-font-family:"Noto Sans Symbols"'><span
style='mso-list:Ignore'>&#9679;<span style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</span></span></span><![endif]><span lang=ru style='font-size:12.0pt;
line-height:150%;font-family:"Times New Roman",serif;mso-fareast-font-family:
"Times New Roman"'>3-комнатный люкс с камином и сауной – 5 300 р.<o:p></o:p></span></p>

<p class=MsoNormal style='margin-top:12.0pt;margin-right:0cm;margin-bottom:
12.0pt;margin-left:0cm;text-align:justify;line-height:150%'><span lang=ru
style='font-size:12.0pt;line-height:150%;font-family:"Times New Roman",serif;
mso-fareast-font-family:"Times New Roman"'>В номере телевизор, ванная комната с
современной сантехникой, полноценная кухня, оборудованная бытовой техникой,
посудой, обеденным столом. Теплый пол, горячая вода создают комфорт и уют. Есть
зона барбекю с беседкой, мангалом, кострищем, бесплатными дровами. <o:p></o:p></span></p>

<p class=MsoNormal style='margin-top:12.0pt;margin-right:0cm;margin-bottom:
12.0pt;margin-left:0cm;text-align:justify;line-height:150%'><span lang=ru
style='font-size:12.0pt;line-height:150%;font-family:"Times New Roman",serif;
mso-fareast-font-family:"Times New Roman"'>Можно посетить баню с парной,
полотенца и простыни выдаются.<o:p></o:p></span></p>

<p class=MsoNormal style='margin-top:12.0pt;margin-right:0cm;margin-bottom:
12.0pt;margin-left:0cm;text-align:justify;line-height:150%'><span lang=ru
style='font-size:12.0pt;line-height:150%;font-family:"Times New Roman",serif;
mso-fareast-font-family:"Times New Roman"'>Кругом лес, возможна аренда
снегоходов. Заядлые рыбаки будут довольны уловом, охотники – дичью, любители
тихой охоты насладятся обилием грибов и ягод. <o:p></o:p></span></p>

<p class=MsoNormal style='margin-top:12.0pt;margin-right:0cm;margin-bottom:
12.0pt;margin-left:0cm;text-align:justify;line-height:150%'><span lang=ru
style='font-size:12.0pt;line-height:150%;font-family:"Times New Roman",serif;
mso-fareast-font-family:"Times New Roman"'>Есть все необходимое для отдыха:
пирс, спуск лодок, оборудованные места для безопасного купания, водных
развлечений, аренда велосипедов для прогулок вдоль озера.<o:p></o:p></span></p>

<p class=MsoNormal style='margin-top:12.0pt;margin-right:0cm;margin-bottom:
12.0pt;margin-left:0cm;text-align:justify;line-height:150%'><span lang=ru
style='font-size:12.0pt;line-height:150%;font-family:"Times New Roman",serif;
mso-fareast-font-family:"Times New Roman"'>Можно купить экскурсии на Валаам и <span
class=SpellE>Рускеальский</span> мраморный каньон<o:p></o:p></span></p>

<p class=MsoNormal style='margin-top:12.0pt;margin-right:0cm;margin-bottom:
12.0pt;margin-left:0cm;text-align:justify;line-height:150%'><span lang=ru
style='font-size:12.0pt;line-height:150%;font-family:"Times New Roman",serif;
mso-fareast-font-family:"Times New Roman"'>Из плюсов отмечают наличие
завтраков, из минусов – плохая звукоизоляция домиков. Рейтинг 9,8 из 10.<o:p></o:p></span></p>

<h3 style='margin-top:10.0pt;margin-right:0cm;margin-bottom:12.0pt;margin-left:
0cm;text-align:justify;line-height:150%'><b style='mso-bidi-font-weight:normal'><span
lang=ru style='font-size:12.0pt;line-height:150%;font-family:"Times New Roman",serif;
mso-fareast-font-family:"Times New Roman";color:#4F81BD'>Базы отдыха в
Сортавале на берегу озера (недорого)<o:p></o:p></span></b></h3>

<p class=MsoNormal style='margin-top:12.0pt;margin-right:0cm;margin-bottom:
12.0pt;margin-left:0cm;text-align:justify;line-height:150%'><span lang=ru
style='font-size:12.0pt;line-height:150%;font-family:"Times New Roman",serif;
mso-fareast-font-family:"Times New Roman"'>В окрестностях Сортавале немало
недорогих баз отдыха. Обычно они расположены у маленьких природных водоемов,
каких в Карелии тысячи, запрятанных среди первозданных лесов. Предлагаются
домики для тихого семейного отдыха вдали от городского шума.<o:p></o:p></span></p>

<p class=MsoNormal style='margin-top:12.0pt;margin-right:0cm;margin-bottom:
12.0pt;margin-left:0cm;text-align:justify;line-height:150%'><span lang=ru><a
href="https://turbazy.ru/list/respublika_kareliya/alasari.html"><span
style='font-size:12.0pt;line-height:150%;font-family:"Times New Roman",serif;
mso-fareast-font-family:"Times New Roman";color:#1155CC'>База <span
class=SpellE>Аласари</span></span></a></span><span lang=ru style='font-size:
12.0pt;line-height:150%;font-family:"Times New Roman",serif;mso-fareast-font-family:
"Times New Roman"'> (<span class=SpellE>Кааламо</span>, 1,3 км. от
Петрозаводской губы) расположена на берегу озера <span class=SpellE>Сиесманъярви</span>,
вблизи нет населенных пунктов. Это райское место для рыбаков, мечтающих о
богатом улове карельской щуки, окуня, леща.<o:p></o:p></span></p>

<p class=MsoNormal style='margin-top:12.0pt;margin-right:0cm;margin-bottom:
12.0pt;margin-left:0cm;text-align:justify;line-height:150%'><span lang=ru
style='font-size:12.0pt;line-height:150%;font-family:"Times New Roman",serif;
mso-fareast-font-family:"Times New Roman"'>Предлагаются домики по 3 000 – 3 400
р. за ночь (без питания).<o:p></o:p></span></p>

<p class=MsoNormal style='margin-top:12.0pt;margin-right:0cm;margin-bottom:
12.0pt;margin-left:0cm;text-align:justify;line-height:150%'><span lang=ru
style='font-size:12.0pt;line-height:150%;font-family:"Times New Roman",serif;
mso-fareast-font-family:"Times New Roman"'>Уютные домики стоят у берега среди
берез. Есть удобная мебель, необходимое оборудование для приготовления пищи,
ванная комната, душ, работает телевизор, холодильник.<o:p></o:p></span></p>

<p class=MsoNormal style='margin-top:12.0pt;margin-right:0cm;margin-bottom:
12.0pt;margin-left:0cm;text-align:justify;line-height:150%'><span lang=ru
style='font-size:12.0pt;line-height:150%;font-family:"Times New Roman",serif;
mso-fareast-font-family:"Times New Roman"'>Пляж, лодки предоставляются
бесплатно. Доступны пешие прогулки, на велосипедах, в окрестных лесах поражает
обилие белых грибов, разных ягод.<o:p></o:p></span></p>

<p class=MsoNormal style='margin-top:12.0pt;margin-right:0cm;margin-bottom:
12.0pt;margin-left:0cm;text-align:justify;line-height:150%'><span lang=ru
style='font-size:12.0pt;line-height:150%;font-family:"Times New Roman",serif;
mso-fareast-font-family:"Times New Roman"'>Вечером приятно посидеть у костра,
полюбоваться белыми ночами, приготовить рыбу.<o:p></o:p></span></p>

<p class=MsoNormal style='margin-top:12.0pt;margin-right:0cm;margin-bottom:
12.0pt;margin-left:0cm;text-align:justify;line-height:150%'><span lang=ru
style='font-size:12.0pt;line-height:150%;font-family:"Times New Roman",serif;
mso-fareast-font-family:"Times New Roman"'>Интересно посетить Мраморный каньон,
водопады, остров Валаам. Для любителей активного отдыха организуются сплавы по
горным рекам, охота.<o:p></o:p></span></p>

<p class=MsoNormal style='margin-top:12.0pt;margin-right:0cm;margin-bottom:
12.0pt;margin-left:0cm;text-align:justify;line-height:150%'><span lang=ru
style='font-size:12.0pt;line-height:150%;font-family:"Times New Roman",serif;
mso-fareast-font-family:"Times New Roman"'>От Сортавала заказывается трансфер –
1 300 р машина на 4 чел.<o:p></o:p></span></p>

<p class=MsoNormal style='margin-top:12.0pt;margin-right:0cm;margin-bottom:
12.0pt;margin-left:0cm;text-align:justify;line-height:150%'><span lang=ru
style='font-size:12.0pt;line-height:150%;font-family:"Times New Roman",serif;
mso-fareast-font-family:"Times New Roman"'>От ж/д станции <span class=SpellE>Кааламо</span>
трансфер бесплатный.<o:p></o:p></span></p>

<p class=MsoNormal style='margin-top:12.0pt;margin-right:0cm;margin-bottom:
12.0pt;margin-left:0cm;line-height:150%'><span lang=ru style='font-size:12.0pt;
line-height:150%;font-family:"Times New Roman",serif;mso-fareast-font-family:
"Times New Roman"'>Туризм на северо-западе России развивается. Карельские базы
отдыха на берегу прекрасных озер, гостевые дома, экскурсии по историческим
местам и достопримечательностям на любой вкус и кошелек ждут гостей в новом
сезоне.<br style='mso-special-character:line-break'>
<![if !supportLineBreakNewLine]><br style='mso-special-character:line-break'>
<![endif]></span></p>

</div>

</body>

</html>


<html lang="ru">
  <head>
    <meta charset="utf-8">
   
    <meta name="viewport" content="width=device-width, minimum-scale=0.25, maximum-scale=5, initial-scale=1.0" />
    
    <title>Заголовок страницы</title>
    <link rel="stylesheet" href="./scss/style.css">

    <meta property="og:title" content="Заголовок страницы в OG">
    <meta property="og:description" content="Описание страницы в OG">
    <meta property="og:image" content="https://example.com/image.jpg">
    <meta property="og:url" content="https://example.com/">
  </head>
  <body>
    <header>
      <h1>Личный сайт</h1>
      <p>Который сделан на основе готового шаблона</p>

<video controls>
    <video width="100%" height="auto" autoplay muted>
  <source src="video.mp4"  type="video/mp4; codecs=avc1.42E01E,mp4a.40.2">


  
  Your browser does not support the video tag.
</video>

<script> 
function myFunction() { 
  document.getElementById("mp4_src").src = "movie.mp4";
  document.getElementById("ogg_src").src = "movie.ogg";
  document.getElementById("myVideo").load();
} 
</script> 

      <nav>
        <ul>
          <li><a href="index.html">Эта страница пока в разработке</a></li>
          <li><a href="https://sonniyzaliv.ru/chernika-v-zalive">Тут Черника</a></li>
           <li><a href="https://sonniyzaliv.ru/chernaya-zhemchuzhina">А здесь ссылка в жемчужину</a></li>
           <li><a href="https://sonniyzaliv.ru/chernika-v-zalive">а тут снова ЧЕРНИКА</a></li>
        </ul>
      </nav>
    </header>
    <main>
      <article>
 
  background: url('video.mp4');
  background-size: cover;


.bgvideo 
  position: fixed;
  right: 0;
  bottom: 0;
  min-width: 100%;
  min-height: 100%;
  width: auto;
  height: auto;
  z-index: -9999;
        <section>
          <h2>Первая секция</h2>
          <p>Она обо мне</p>
          <img src="images/IMG_1021.JPEG" alt="Человек и пароход">
          <p>Но может быть и о семантике, я пока не решил.</p>
        </section>
        <section>
          <h2>Вторая секция</h2>
          <p>Она тоже обо мне</p>
        </section>
        <section>
          <h2>И третья</h2>
          <p>Вы уже должны были начать догадываться.</p>
        </section>
      </article>
    </main>
    <footer>
      <p>Сюда бы я вписал информацию об авторе и ссылки на другие сайты</p>
    </footer>
 
    <p><h1 style="text-align: justify;"><b>Карельские базы отдыха на берегу</b></h1> <p style="text-align: justify;"></p> <p style="text-align: justify;"><span>Карелия &ndash; республика с многочисленными голубыми озерами среди первозданных лесов. Особенно их много, крупных и совсем крошечных, на севере, в бассейне Белого моря. Умеренный климат &ndash; теплые зимы и нежаркое лето, красота природы, озера, богатые рыбой, базы отдыха вдали от городской суеты и промышленных центров притягивают сюда миллионы туристов. Крупные комфортабельные отели, маленькие базы отдыха без особого изыска &ndash; любой вид отдыха востребован и имеет своих почитателей.</span></p> <h2 style="text-align: justify;"><b>База отдыха в Карелии с чаном и баней</b></h2> <p style="text-align: justify;"></p> <p style="text-align: justify;"><span>Сказочная Карелия начинается с банного чана. Это чудо сравнивают с геотермальной ванной, его еще называют &laquo;молодильным чаном&raquo;. Это самый шикарный вид отдыха, который предлагает Карелия.</span></p> <p style="text-align: justify;"></p> <p style="text-align: justify;"><span>Сибирский банный чан совмещает в себе возможность охладиться и погреться, попариться. Он похож на парилку в русской бане, но имеет некоторые отличия и преимущества. Тепло в чане распределяется снизу вверх, прогревается равномерно, при этом сохраняя голову на свежем воздухе. Процедура укрепляет иммунитет, восстанавливает силы, повышает настроение. </span></p> <p style="text-align: justify;"></p> <p style="text-align: justify;"><span>Одна из таких купелей установлена под открытым небом на террасе коттеджа базы отдыха &laquo;Лунный залив&raquo;. Вода в чане нагревается до 40 градусов. Жарко будет даже в мороз. </span></p> <p style="text-align: justify;"></p> <p style="text-align: justify;"><span>База предлагает в аренду благоустроенные номера площадью 42 м</span><span>2</span><span> с двуспальной кроватью или двухъярусной кроватью. </span></p> <p style="text-align: justify;"></p> <p style="text-align: justify;"><span>Аренда номера на двоих без питания &ndash; 6 470 р.</span></p> <p style="text-align: justify;"></p> <p style="text-align: justify;"><span>Собственная ванная комната, бесплатный Wi-fi, кондиционер, спутниковое телевидение, терраса. В ванной комнате душевая кабина, стиральная машина. Есть электроплита и посуда, принадлежности для барбекю.</span></p> <p style="text-align: justify;"></p> <p style="text-align: justify;"><span>База отдыха &laquo;Сонный залив&raquo; в Сортавале тоже предлагает сауну с купелью. Дома расположены на берегу озера в Ладожских шхерах, в 10 минутах от туристического центра Сортавала.</span></p> <p style="text-align: justify;"></p> <p style="text-align: justify;"><span>Аренда номера для 4 гостей без питания &ndash; 8 830 р. в сутки. С</span><span>ауна и купель с фильтрацией оплачиваются отдельно &ndash; от 2 500 р.</span></p> <p style="text-align: justify;"></p> <p style="text-align: justify;"><span>Есть причал, пирс и пристань, пляж, предлагается аренд лодки. Есть возможность взять гида по Валааму, прогулку на катере по Ладожским шхерам, на остров Валаам.</span></p> <p style="text-align: justify;"></p> <p style="text-align: justify;"><span>Едут сюда для смены обстановки, перезагрузки, снятия усталости. </span></p> <p style="text-align: justify;"></p> <p style="text-align: justify;"><span>Комфортабельный коттедж с удобствами, рыбалка прямо у дома, дровяная баня с террасой, банным чаном премиум класса &ndash; отличный отдых от городской суеты. Лежать в горячей воде под открытым небом, ловить снежинки, любоваться на звезды &ndash; что может быть лучше для души и тела.   </span></p> <p style="text-align: justify;"></p> <h2 style="text-align: justify;"><b>База отдыха в Сортавале на берегу озера</b></h2> <p style="text-align: justify;"></p> <p style="text-align: justify;"><span>База отдыха &laquo;Черная Жемчужина&raquo; (Сонный залив) расположена в поселке Нукутталахти Сортавальского городского поселения Карелии. Гостям предлагаются уютные коттеджи, оснащенные всем необходимым для комфорта. Домики с панорамными окнами на залив стоят на первой линии. Отдыхающие отмечают изумительно красивые закаты, бездонное звездное небо, вековые сосны, тишину.</span></p> <p style="text-align: justify;"></p> <p style="text-align: justify;"><span>На базе можно арендовать уютный домик на берегу озера:</span></p> <ul style="text-align: justify;"> <li style="font-weight: 400;" aria-level="1"><span>домик 45 м</span><span>2</span><span> для двоих гостей &ndash; 3 200 в сутки;</span></li> <li style="font-weight: 400;" aria-level="1"><span>дом 80 м</span><span>2</span><span> с двумя спальнями для четверых &ndash; 5 300 р;</span></li> <li style="font-weight: 400;" aria-level="1"><span>В наличии подарочные сертификаты по 5 000 р. (дата заезда открытая);</span></li> </ul> <p style="text-align: justify;"></p> <p style="text-align: justify;"><span>Внутри домиков приятный минималистический интерьер, посудомойка, стиральная машина. У каждого дома терраса. Есть Wi-fi. </span></p> <p style="text-align: justify;"></p> <p style="text-align: justify;"><span>Доступно бронирование, завтраки в ресторане &laquo;Ламберг&raquo; (100 м от дома). Работает доставка продуктов из магазина &laquo;Лента&raquo;. Есть место для шашлыка, решетка, шампуры прилагаются.</span></p> <p style="text-align: justify;"></p> <p style="text-align: justify;"><span>Можно арендовать лодку по приемлемой цене. Рядом клуб, баня и ресторан. Можно сходить на экскурсию в Музей Северного Приладожья. </span></p> <p style="text-align: justify;"></p> <p style="text-align: justify;"><span>Бесплатная парковка, до Сортавала ходит Яндекс-такси. </span></p> <p style="text-align: justify;"></p> <p style="text-align: justify;"><span>Созданы условия для отдыха с детьми. В домиках тепло, ванные комнаты оборудованы полотенцесушителем. На кухне много всякой посуды, стульчик для кормления и горшок. Есть соль, сахар, крупы, макароны, чай, кофе. Микроволновка, тостер, кофеварка, посудомойка. Стиральная машина, средство для стирки, гель для душа &ndash; мелочи, но приятно, заезжай и живи. Рейтинг 5 из 5.</span></p> <p style="text-align: justify;"></p> <h2 style="text-align: justify;"><b>База отдыха Ламберг Карелия (официальный сайт)</b></h2> <p style="text-align: justify;"><span>Здесь найдете небольшой комплекс бревенчатых коттеджей с уютным отелем из 12 номеров. База отдыха 2010 г. постройки, до г. Сортавала &ndash; 5,6 км, международного аэропорта Бесовец &ndash; 246 км.</span></p> <p style="text-align: justify;"></p> <p style="text-align: justify;"><span>Отель расположен на первой береговой линии Ладожского озера. Для отдыхающих пирс, песчаный пляж, правда, необорудованный. </span></p> <p style="text-align: justify;"></p> <p style="text-align: justify;"><span>На базе имеются конференц-зал, ресторан с баром, банкетный зал, кафе, магазин сувениров, джакузи, сауна, паровая баня, парковка. Созданы все условия для семейного отдыха с детьми, можно заезжать с домашними животными.</span></p> <p style="text-align: justify;"></p> <p style="text-align: justify;"><span>Для развлечений предлагается рыбалка, охота, катание на снегоходах, квадроциклах, дартс, экскурсии. Есть детская площадка, настольный теннис, бильярд, аренда велосипедов, прокат горнолыжного снаряжения, аренда яхт и катеров.</span></p> <ul style="text-align: justify;"> <li style="font-weight: 400;" aria-level="1"><span>Стандартные номера &ndash; от 6 400 р за ночь.</span></li> <li style="font-weight: 400;" aria-level="1"><span>Ванные комнаты с косметическими принадлежностями, детские кроватки &ndash; бесплатно.</span></li> <li style="font-weight: 400;" aria-level="1"><span>Катание на снегоходах &ndash; 200 р.</span></li> <li style="font-weight: 400;" aria-level="1"><span>Катание на квадроциклах &ndash; 3 600 р.</span></li> <li style="font-weight: 400;" aria-level="1"><span>Летняя рыбалка &ndash; от 3 000 р.</span></li> <li style="font-weight: 400;" aria-level="1"><span>Охота &ndash; от 15 000 р.</span></li> </ul> <p style="text-align: justify;"></p> <p style="text-align: justify;"><span>Отличное место для отдыха в любое время года. Номера отапливаются, во многих полы с подогревом, санузел, камин, телевизор, холодильник, кухонный уголок с чайником, мини-баром, сейф в каждом номере. </span></p> <p style="text-align: justify;"></p> <p style="text-align: justify;"><span>Очень красивое уединенное место, присутствует национальный колорит. Оценка &ndash; 5 из 5 (480 отзывов).</span></p> <h2 style="text-align: justify;"><b>База отдыха Остров Карелия</b></h2> <p style="text-align: justify;"><span>Туристический комплекс расположен на Острове Риеккалансаари под горой Ворсунмяки, прямо на побережье Ладожского озера, окружен хвойными лесами. Здесь начинаются Шхеры. Первая линия домов с мансардными окнами позволяет наслаждаться прекрасными закатами и звездным небом. </span></p> <ul style="text-align: justify;"> <li style="font-weight: 400;" aria-level="1"><span>2-этажный домик мансардного типа стоит от 5 100 до 8 500 р;</span></li> <li style="font-weight: 400;" aria-level="1"><span>Столько же стоит квартира &laquo;В гостях у бабы Поли&raquo; на ул. Карельская 50;</span></li> <li style="font-weight: 400;" aria-level="1"><span>Коттедж (Дом художника) &ndash; 14 800 руб. без питания.</span></li> </ul> <p style="text-align: justify;"></p> <p style="text-align: justify;"><span>Возможно проживание с животными, есть площадки для пикника (одна на два домика), интернет. Дома отапливаются, оборудованы теплыми полами, камином. Есть отдельный санузел, душ, кухонный уголок, холодильник, плита. Доставка еды по заказу. </span></p> <p style="text-align: justify;"></p> <p style="text-align: justify;"><span>В наличии сауна, оздоровительный центр.</span></p> <p style="text-align: justify;"></p> <p style="text-align: justify;"><span>Из развлечений предлагается охота, бильярд, прокат квадроциклов, снегоходов, лодок, оборудование для водных видов спорта, снорклинг, виндсерфинг, йога, бадминтон, ферма животных. Можно заняться рыбалкой, покататься на лыжах, лошадях. </span></p> <p style="text-align: justify;"></p> <p style="text-align: justify;"><span>Парковка бесплатная. Старинный сад для прогулок. Можно заказать трансфер из ж/д вокзала, автовокзала.</span></p> <p style="text-align: justify;"></p> <p style="text-align: justify;"><span>База подходит для семейного отдыха. Но много отрицательных отзывов. В основном жалуются на отсутствие сервиса, на несоответствие ожидаемого с реальными условиями проживания.</span></p> <h2 style="text-align: justify;"><b>База отдыха Черные Камни в Карелии (официальный сайт цены)</b></h2> <p style="text-align: justify;"><span>База на берегу озера Янисъярви (п. Киркколахти) среди завораживающих лесов отличается ухоженной территорией. Озеро образовалось на месте падения метеорита. К услугам гостей:</span></p> <ul style="text-align: justify;"> <li style="font-weight: 400;" aria-level="1"><span>27 коттеджей комфорт-класса у озера;</span></li> <li style="font-weight: 400;" aria-level="1"><span>двухместные номера гостиницы &laquo;Атлантика&raquo; (территория Карельского зоопарка и берег озера); </span></li> <li style="font-weight: 400;" aria-level="1"><span>панорамный ресторан с карельской кухней;</span></li> <li style="font-weight: 400;" aria-level="1"><span>120 метров до Карельского зоопарка, 12 км до Горного парка &laquo;Рускеала&raquo;;</span></li> <li style="font-weight: 400;" aria-level="1"><span>банные комплексы, бассейн, услуги массажа; </span></li> </ul> <ul style="text-align: justify;"> <li style="font-weight: 400;" aria-level="1"><span>однокомнатный номер гостиницы &laquo;Атлантика&raquo; на двоих &ndash; 10 тыс. в сутки; номер делюкс &ndash; 13 тыс.; люкс &ndash; 15 тыс;</span></li> <li style="font-weight: 400;" aria-level="1"><span>номер стандарт Экогостиницы можно забронировать за 7 800 р в сутки; семейный &ndash; 15 440 р; семейный люкс &ndash; 17 500 р;</span></li> <li style="font-weight: 400;" aria-level="1"><span>коттеджи: шестиместный &ndash; от 32 000 р; делюкс &ndash; 38 400 р; 8-местный &ndash; 43 600.</span></li> </ul> <p style="text-align: justify;"></p> <p style="text-align: justify;"><span>6-местный дом рыбака &ndash; 44 200; дом охотника &ndash; 51 200; коттедж на воде &laquo;Михаил Светлофф&raquo; &ndash; 54 000; 10-местный с камином &ndash; 59 100, с камином и сауной &ndash; 59 100; 12-местный &ndash; 67 200; делюкс &ndash; 93 600 р; 10-местный коттедж плюс СПА &ndash; 93 600, 14-местный люкс &ndash; 107 600 р.</span></p> <p style="text-align: justify;"></p> <p style="text-align: justify;"><span>Условия предлагаются на разный вкус и кошелек. Баня и сауна, рыбалка и охота, экскурсии и вылазки в лес, отдых вдвоем, с детьми и большой компанией &ndash; разнообразие отдыха впечатляет. </span></p> <h2 style="text-align: justify;"><b>Базы отдыха в Сортавале, Карелия</b></h2> <p style="text-align: justify;"><span>База отдыха &laquo;Арсенал&raquo; (п. Вяртсиля, 6 км от автодороги на Суйстамо) расположена в 6 км от центра Сортавале, 150 м от озера Янисъярви. Кругом первозданная северная природа с вековыми лесами, 5 км до границы с Финляндией</span></p> <p style="text-align: justify;"></p> <p style="text-align: justify;"><span>Для отдыха предлагаются деревянные домики и коттеджи:</span></p> <ul style="text-align: justify;"> <li style="font-weight: 400;" aria-level="1"><span>Трехместный однокомнатный номер &ndash; от 5 000 р (с завтраком);</span></li> </ul> <ul style="text-align: justify;"> <li style="font-weight: 400;" aria-level="1"><span>3-комнатный номер на 4 чел. &ndash; от 7 500 р;</span></li> <li style="font-weight: 400;" aria-level="1"><span>3-комнатный люкс с камином и сауной &ndash; 5 300 р.</span></li> </ul> <p style="text-align: justify;"></p> <p style="text-align: justify;"><span>В номере телевизор, ванная комната с современной сантехникой, полноценная кухня, оборудованная бытовой техникой, посудой, обеденным столом. Теплый пол, горячая вода создают комфорт и уют. Есть зона барбекю с беседкой, мангалом, кострищем, бесплатными дровами. </span></p> <p style="text-align: justify;"></p> <p style="text-align: justify;"><span>Можно посетить баню с парной, полотенца и простыни выдаются.</span></p> <p style="text-align: justify;"></p> <p style="text-align: justify;"><span>Кругом лес, возможна аренда снегоходов. Заядлые рыбаки будут довольны уловом, охотники &ndash; дичью, любители тихой охоты насладятся обилием грибов и ягод. </span></p> <p style="text-align: justify;"></p> <p style="text-align: justify;"><span>Есть все необходимое для отдыха: пирс, спуск лодок, оборудованные места для безопасного купания, водных развлечений, аренда велосипедов для прогулок вдоль озера.</span></p> <p style="text-align: justify;"></p> <p style="text-align: justify;"><span>Можно купить экскурсии на Валаам и Рускеальский мраморный каньон</span></p> <p style="text-align: justify;"></p> <p style="text-align: justify;"><span>Из плюсов отмечают наличие завтраков, из минусов &ndash; плохая звукоизоляция домиков. Рейтинг 9,8 из 10.</span></p> <h2 style="text-align: justify;"><b>Базы отдыха в Сортавале на берегу озера (недорого)</b></h2> <p style="text-align: justify;"></p> <p style="text-align: justify;"><span>В окрестностях Сортавале немало недорогих баз отдыха. Обычно они расположены у маленьких природных водоемов, каких в Карелии тысячи, запрятанных среди первозданных лесов. Предлагаются домики для тихого семейного отдыха вдали от городского шума.</span></p> <p style="text-align: justify;"></p> <p style="text-align: justify;"><span>База Аласари (Кааламо, 1,3 км. от Петрозаводской губы) расположена на берегу озера Сиесманъярви, вблизи нет населенных пунктов. Это райское место для рыбаков, мечтающих о богатом улове карельской щуки, окуня, леща.</span></p> <p style="text-align: justify;"></p> <p style="text-align: justify;"><span>Предлагаются домики по 3 000 &ndash; 3 400 р. за ночь (без питания).</span></p> <p style="text-align: justify;"></p> <p style="text-align: justify;"><span>Уютные домики стоят у берега среди берез. Есть удобная мебель, необходимое оборудование для приготовления пищи, ванная комната, душ, работает телевизор, холодильник.</span></p> <p style="text-align: justify;"></p> <p style="text-align: justify;"><span>Пляж, лодки предоставляются бесплатно. Доступны пешие прогулки, на велосипедах, в окрестных лесах поражает обилие белых грибов, разных ягод.</span></p> <p style="text-align: justify;"></p> <p style="text-align: justify;"><span>Вечером приятно посидеть у костра, полюбоваться белыми ночами, приготовить рыбу.</span></p> <p style="text-align: justify;"></p> <p style="text-align: justify;"><span>Интересно посетить Мраморный каньон, водопады, остров Валаам. Для любителей активного отдыха организуются сплавы по горным рекам, охота.</span></p> <p style="text-align: justify;"></p> <p style="text-align: justify;"><span>От Сортавала заказывается трансфер &ndash; 1 300 р машина на 4 чел.</span></p> <p style="text-align: justify;"></p> <p style="text-align: justify;"><span>От ж/д станции Кааламо трансфер бесплатный.</span></p> <p style="text-align: justify;"><span>Туризм на северо-западе России развивается. Карельские базы отдыха на берегу прекрасных озер, гостевые дома, экскурсии по историческим местам и достопримечательностям на любой вкус и кошелек ждут гостей в новом сезоне.</span><span></span></p>
    
    
  
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
  </body>
</html>


<html lang="ru" prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb#">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title><?php echo $title; ?></title>
    <meta name="description" content="<?php echo $descr; ?>">
    <meta name="keywords" content="<?php echo $keywords; ?>">

    <meta property="og:type" content="website">
    <meta property="og:site_name" content="Сонный Залив">
    <meta property="og:title" content="<?php echo $title; ?>">
    <meta property="og:description" content="<?php echo $descr; ?>">
    <meta property="og:url" content="https://sonniyzaliv.ru/">
    <meta property="og:locale" content="ru_RU">
    <meta property="og:image" content="images/logo.png">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" as="style" rel="preload" onload="this.rel='stylesheet'">

    <link href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css" as="style" rel="preload" onload="this.rel='stylesheet'">

    <link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.css">

    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">

    <link rel="stylesheet" href="css/t-datepicker.min.css">
    <link rel="stylesheet" href="css/themes/t-datepicker-purple.css">

    <link rel="stylesheet" href="css/aos.css">

    <link href="css/flexslider/flexslider.css" rel="stylesheet">

    <link href="libs/et-line-font/et-line-font.css?v=3.3" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="css/font-awesome.min.css" rel="stylesheet">

    <!-- Favicon -->
    <link rel="shortcut icon" href="https://sonniyzaliv.ru/favicon.ico" type="image/x-icon">
    <link href="favicon.ico" rel="icon" type="image/x-icon">

    <link href="css/ionicons.min.css" as="style" rel="preload" onload="this.rel='stylesheet'">

    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css/jquery.timepicker.css">

    <!-- Swiper -->
    <link href="css/swiper.min.css" as="style" rel="preload" onload="this.rel='stylesheet'" type="text/css"/>

    <link rel="stylesheet" href="css/flaticon.css?v=3.4">
    <link rel="stylesheet" href="css/mistral.css">
    <link rel="stylesheet" href="css/monotype_corsiva.css">
    <link href="css/icomoon.css?v=3.4" as="style" rel="preload" onload="this.rel='stylesheet'">
    <link href="css/style.min.css?v=<?php echo VERSION['styles']?>" as="style" rel="preload" onload="this.rel='stylesheet'">

    <meta name="yandex-verification" content="077ed0cb5ca007c0" />
    <!-- start TL head script -->
    <script type='text/javascript'>
        (function(w) {
            var q = [
                ['setContext', 'TL-INT-sonniyzaliv_2023-01-11', 'ru'],
                ['embed', 'search-form', {
                    container: 'tl-search-form'
                }]
            ];
            var h=["ru-ibe.tlintegration.ru","ibe.tlintegration.ru","ibe.tlintegration.com"];
            var t = w.travelline = (w.travelline || {}),
                ti = t.integration = (t.integration || {});
            ti.__cq = ti.__cq? ti.__cq.concat(q) : q;
            if (!ti.__loader) {
                ti.__loader = true;
                var d=w.document,c=d.getElementsByTagName("head")[0]||d.getElementsByTagName("body")[0];
                function e(s,f) {return function() {w.TL||(c.removeChild(s),f())}}
                (function l(h) {
                    if (0===h.length) return; var s=d.createElement("script");
                    s.type="text/javascript";s.async=!0;s.src="https://"+h[0]+"/integration/loader.js";
                    s.onerror=s.onload=e(s,function(){l(h.slice(1,h.length))});c.appendChild(s)
                })(h);
            }
        })(window);
        document.addEventListener('DOMContentLoaded', function(){
            var container = document.querySelector(".hero-wrap .col-md-9");
            var searchForm = document.querySelector("#block-search");
            container.appendChild(searchForm);
        });
    </script>
    <link rel="stylesheet" href="css/travelline-style.css">
    <!-- end TL head script -->
</head>
<body>
<header class="header">
    <div itemscope itemtype="https://schema.org/Organization" style="display:none;">
        <meta itemprop="name" content="<?php echo $title; ?>" />
        <link itemprop="url" href="https://sonniyzaliv.ru/" />
        <link itemprop="logo" href="https://sonniyzaliv.ru/images/logo.png" />
        <meta itemprop="description" content="<?php echo $descr; ?>" />
        <meta itemprop="email" content="sonniyzaliv@yandex.ru" />
        <div itemprop="address" itemscope itemtype="https://schema.org/PostalAddress">
            <meta itemprop="addressLocality" content="Нукутталахти" />
            <meta itemprop="postalCode" content="186790" />
            <meta itemprop="streetAddress" content="Центральная, 52" />
        </div>
        <meta itemprop="telephone" content="+7 981 187-80-02" />
        <meta itemprop="telephone" content="+7 981 750-44-89" />
        <link itemprop="sameAs" href="https://instagram.com/sonniy_zaliv_sortavala?utm_medium=copy_link" />
    </div>
    <section class="nav-container">
        <div class="wrapper">
            <a href="/" class="brand">Сонный Залив</a>
            <button type="button" class="burger" id="burger">
                <span class="burger-line"></span>
                <span class="burger-line"></span>
                <span class="burger-line"></span>
                <span class="burger-line"></span>
            </button>
            <span class="overlay" id="overlay"></span>
            <nav class="navbar" id="navbar">
                <ul class="menu">
                    <li class="menu-item"><a href="/">Главная</a></li>
                </ul>
            </nav>
        </div>
    </section>
</header>
<!-- END nav -->
<main role="main">
    <section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url('images/taksi/taxi.webp');" data-stellar-background-ratio="0.5">
      <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate pb-5 text-center">
              <h1 id="act-form" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Такси Сортавала</h1>
              <h2 class="subtext" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Полный список номеров телефонов такси в Сортавала</h2>
              <p class="breadcrumbs pt-5" style="font-weight: bold"><span class="mr-2"><a href="/">Главная <i class="ion-ios-arrow-forward"></i></a></span><span>Такси Сортавала</span></p>
              <?php echo $iconBlock; ?>
          </div>
            <div class="icon-scroll col-md-12">
                <div class="mouse">
                    <div class="wheel"></div>
                </div>
                <div class="icon-arrows">
                    <span></span>
                </div>
            </div>
        </div>
          <!-- start TL Search form script -->
          <div id='block-search'>
              <div id='tl-search-form' class='tl-container'>
                  <noindex><a href='https://www.travelline.ru/products/tl-hotel/' rel='nofollow' target='_blank'>TravelLine</a></noindex>
              </div>
          </div>
          <!-- end TL Search form script -->
      </div>
    </section>
    <section id="partnerTaxi" class="ftco-section services-section bg-light ftco-no-pb">
        <div class="container">
            <div class="row d-flex">
                <div class="col-md-12 centered-text pb-5 heading-section pl-md-5 ftco-animate">
                    <h2 class="mb-4">Такси "Сонный Залив"</h2>
                    <p>Брендированное авто "Сонный Залив". Трансфер: Санкт-Петербург, Петрозаводск</p>
                </div>
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-12 d-flex align-self-stretch ftco-animate">
                            <div class="media block-6 services d-block">
                                <div class="icon"><span class="icon-local_taxi"></span></div>
                                <div class="media-body">
                                    <h3 class="heading mb-3" style="padding-top: 10px; color: #813333;">"Сонный Залив"</h3>
                                    <p style="color: #443e70;;font-weight: 700; text-align: left"><i style="color: #ff5154;" class="icon-phone_android"></i> +7 (921) 522-34-55<br>
                                        <i style="color: #ff5154;" class="icon-car"></i> Chevrolet<br>
                                        <i style="color: #ff5154;" class="icon-clock-o"></i> Круглосуточно<br>
                                        <i style="color: #ff5154;" class="icon-ruble"></i> Договорная
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 align-self-stretch ftco-animate" style="text-align: center;">
                            <img style="width: 85%;border-radius: 15px;cursor: pointer" src="images/taksi/1.webp" href="images/taksi/1.webp" data-fancybox="gallery-taksi">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row d-flex">
                <div class="col-md-12 centered-text pb-5 pt-50 heading-section pl-md-5 ftco-animate">
                    <h2 class="mb-4">Такси "Вектор"</h2>
                </div>
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-12 d-flex align-self-stretch ftco-animate">
                            <div class="media block-6 services d-block">
                                <div class="icon"><span class="icon-local_taxi"></span></div>
                                <div class="media-body">
                                    <h3 class="heading mb-3" style="padding-top: 10px; color: #813333;">"Вектор"</h3>
                                    <p style="color: #443e70;font-weight: 700; text-align: left"><i style="color: #ff5154;" class="icon-phone_android"></i> +7 (921) 010-06-75<br>
                                        <i style="color: #ff5154;" class="icon-car"></i> Иномарки<br>
                                        <i style="color: #ff5154;" class="icon-clock-o"></i> Круглосуточно<br>
                                        <i style="color: #ff5154;" class="icon-ruble"></i> от 100 руб.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 align-self-stretch ftco-animate" style="text-align: center;">
                            <img style="width: 85%;border-radius: 15px;cursor: pointer" src="images/taksi/2.webp" href="images/taksi/2.webp" data-fancybox="gallery-taksi-vektor">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="aboutHome" class="ftco-section services-section bg-light">
       <div class="col-md-12 centered-text pb-5 heading-section pl-md-5 ftco-animate">
        <nav>
        <ul>
          
          <li><a href="https://sonniyzaliv.ru/chernika-v-zalive"><h2 class="mb-4">Тут Черника</h2></a></li>
           <li><a href="https://sonniyzaliv.ru/chernaya-zhemchuzhina"><p>А здесь ссылка в жемчужину</p></a></li>
           <li><a href="https://sonniyzaliv.ru/chernika-v-zalive">а тут снова ЧЕРНИКА</a></li>
        </ul>
      </nav>
        <div class="container">
            <div class="row d-flex">
                <div class="col-md-12 centered-text pb-5 heading-section pl-md-5 ftco-animate">
                    <h2 class="mb-4">Список такси Сортавала</h2>
                    <p>Представляем Вашему вниманию полный список такси города Сортавала:</p>
                </div>
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-3 d-flex align-self-stretch ftco-animate">
                            <div class="media block-6 services d-block">
                                <div class="icon"><span class="icon-local_taxi"></span></div>
                                <div class="media-body">
                                    <h3 class="heading mb-3" style="padding-top: 10px; color: #813333;">"АвтоСортавала"</h3>
                                    <p style="color: #443e70;;font-weight: 700; text-align: left"><i style="color: #ff5154;" class="icon-phone_android"></i> +7 (911) 401-57-93<br>
                                        <i style="color: #ff5154;" class="icon-car"></i> Mercedes-Benz<br>
                                        <i style="color: #ff5154;" class="icon-clock-o"></i> Круглосуточно<br>
                                        <i style="color: #ff5154;" class="icon-ruble"></i> Договорная
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 d-flex align-self-stretch ftco-animate">
                            <div class="media block-6 services d-block">
                                <div class="icon"><span class="icon-local_taxi"></span></div>
                                <div class="media-body">
                                    <h3 class="heading mb-3" style="padding-top: 10px; color: #813333;">"Желтое"</h3>
                                    <p style="color: #443e70;font-weight: 700; text-align: left"><i style="color: #ff5154;" class="icon-phone_android"></i> +7 (900) 460-61-00<br>
                                        <i style="color: #ff5154;" class="icon-car"></i> Иномарки и отеч.<br>
                                        <i style="color: #ff5154;" class="icon-clock-o"></i> Круглосуточно<br>
                                        <i style="color: #ff5154;" class="icon-ruble"></i> Звоните
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 d-flex align-self-stretch ftco-animate">
                            <div class="media block-6 services d-block">
                                <div class="icon"><span class="icon-local_taxi"></span></div>
                                <div class="media-body">
                                    <h3 class="heading mb-3" style="padding-top: 10px; color: #813333;">"Лидер"</h3>
                                    <p style="color: #443e70;font-weight: 700; text-align: left"><i style="color: #ff5154;" class="icon-phone_android"></i> +7 (921) 223-46-33<br>
                                        <i style="color: #ff5154;" class="icon-car"></i> Toyota Corolla<br>
                                        <i style="color: #ff5154;" class="icon-clock-o"></i> Круглосуточно<br>
                                        <i style="color: #ff5154;" class="icon-ruble"></i> Звоните
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 d-flex align-self-stretch ftco-animate">
                            <div class="media block-6 services d-block">
                                <div class="icon"><span class="icon-local_taxi"></span></div>
                                <div class="media-body">
                                    <h3 class="heading mb-3" style="padding-top: 10px; color: #813333;">"Минивен"</h3>
                                    <p style="color: #443e70;font-weight: 700; text-align: left"><i style="color: #ff5154;" class="icon-phone_android"></i> +7 (931) 702-90-91<br>
                                        <i style="color: #ff5154;" class="icon-car"></i> Минивены, авт.<br>
                                        <i style="color: #ff5154;" class="icon-clock-o"></i> Круглосуточно<br>
                                        <i style="color: #ff5154;" class="icon-ruble"></i> от 150 руб.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 d-flex align-self-stretch ftco-animate">
                            <div class="media block-6 services d-block">
                                <div class="icon"><span class="icon-local_taxi"></span></div>
                                <div class="media-body">
                                    <h3 class="heading mb-3" style="padding-top: 10px; color: #813333;">"Soda"</h3>
                                    <p style="color: #443e70;font-weight: 700; text-align: left"><i style="color: #ff5154;" class="icon-phone_android"></i> +7 (921) 801-04-00<br>
                                        <i style="color: #ff5154;" class="icon-car"></i> Разные<br>
                                        <i style="color: #ff5154;" class="icon-clock-o"></i> Круглосуточно<br>
                                        <i style="color: #ff5154;" class="icon-ruble"></i> от 120 руб.
                                    </p>
                                </div>
                            </div>
                        </div>
                      
                        
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="ftco-section module bg-light" id="services">
        <div class="container">
            <div class="row justify-content-center pb-4">
                <div class="col-md-12 heading-section text-center ftco-animate">
                    <h2 class="mb-4">Может быть полезно</h2>
                    <p>Мы собрали для вас некоторое количество полезных ресурсов и сервисов, которые упростят Ваше пребывание в Карелии, а также список интересных мест, которые поспособствуют Вашему времяпровождению и разнообразят его.</p>
                    <p>Мы собрали для вас некоторое количество полезных ресурсов и сервисов, которые упростят Ваше пребывание в Карелии, а также список интересных мест, которые поспособствуют Вашему времяпровождению и разнообразят его.</p>
                    <p>Мы собрали для вас некоторое количество полезных ресурсов и сервисов, которые упростят Ваше пребывание в Карелии, а также список интересных мест, которые поспособствуют Вашему времяпровождению и разнообразят его.</p>
                    <p>Мы собрали для вас некоторое количество полезных ресурсов и сервисов, которые упростят Ваше пребывание в Карелии, а также список интересных мест, которые поспособствуют Вашему времяпровождению и разнообразят его.</p>
                    <p>Мы собрали для вас некоторое количество полезных ресурсов и сервисов, которые упростят Ваше пребывание в Карелии, а также список интересных мест, которые поспособствуют Вашему времяпровождению и разнообразят его.</p>
                    <p>Мы собрали для вас некоторое количество полезных ресурсов и сервисов, которые упростят Ваше пребывание в Карелии, а также список интересных мест, которые поспособствуют Вашему времяпровождению и разнообразят его.</p>
                    <p>Мы собрали для вас некоторое количество полезных ресурсов и сервисов, которые упростят Ваше пребывание в Карелии, а также список интересных мест, которые поспособствуют Вашему времяпровождению и разнообразят его.</p>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <ul class="filter font-alt ftco-animate" id="filters">
                        <li><a class="current wow fadeInUp" href="#" data-filter=".illustration" data-wow-delay="0.2s">Сервисы и услуги</a></li>
                        <li><a class="wow fadeInUp" href="#" data-filter=".marketing" data-wow-delay="0.4s">Еда</a></li>
                        <li><a class="wow fadeInUp" href="#" data-filter=".photography" data-wow-delay="0.6s">Интересные места</a></li>
                        <li><a class="wow fadeInUp" href="#" data-filter=".webdesign" data-wow-delay="0.6s">Развлечения</a></li>
                    </ul>
                </div>
            </div>
            <ul class="works-grid works-grid-3 works-grid-gut works-hover-d ftco-animate" id="works-grid">
                <div class="container">
                    <li class="work-item illustration">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="d-flex align-self-stretch ftco-animate">
                                        <div class="media block-6 services d-block">
                                            <div class="icon">
                                                <span class="icon-local_taxi"></span>
                                            </div>
                                            <div class="media-body">
                                                <h3 class="heading mb-3" style="padding-top: 10px">Такси в Сортавала</h3>
                                                <p>Иногда, во время отдыха в гостевом доме в Сортавала, хочется остаться без личного автомобиля. Осмотреть достопримечательности, поужинать в хорошей компании.<br><br>
                                                    Качественный отдых в загородном доме <b>«Сонный залив»</b>, предполагает возможность отвлечься от ежедневных привычных задач.<br><br>
                                                    Остались до глубокой ночи в купели на террасе, были в сауне и бане, а утром нужно за руль? Это не всегда удобно.<br><br>
                                                    Хорошо, что под рукой есть телефоны городских служб такси.<br><br>
                                                    Водители такси, которые знают; как быстро доехать <b>"Сортавала - Рускеала"</b>, <b>"Сортавала - Чёрные камни"</b>, <b>"Сортавала - Карельский зоопарк"</b>
                                                    Всегда приедут отвезти вашу компанию на легковом автомобиле или микроавтобусе.<br><br>
                                                    Мы покажем Вам список служб такси города, которые предоставляют услуги по минимальным ценам.<br><br>
                                                    Нажав на кнопку <b>"Подробнее"</b>, вы сможете более подробно ознакомиться и узнать: номера телефонов для вызова, официальный сайт, все тарифы и цены на услуги, а также, контакты.
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row d-flex">
                                        <div class="conf-btn" style="padding-bottom: 50px;"><a href="/taksi" target="_blank" class="btn btn-primary py-3 px-4 ftco-animate"><i class="ion-ios-information-circle"></i> Подробнее</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="work-item marketing">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="d-flex align-self-stretch ftco-animate">
                                        <div class="media block-6 services d-block">
                                            <div class="icon">
                                                <span class="icon-restaurant"></span>
                                            </div>
                                            <div class="media-body">
                                                <h3 class="heading mb-3" style="padding-top: 10px">Кафе и ресторанов</h3>
                                                <p>Собрали для Вас список рекомендуемых к посещению ресторанов и кафе в Карелии</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row d-flex">
                                        <div class="conf-btn" style="padding-bottom: 50px;"><a href="/kafe-i-restorany" target="_blank" class="btn btn-primary py-3 px-4 ftco-animate"><i class="ion-ios-information-circle"></i> Подробнее</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                </div>
            </ul>
        </div>
    </section>

    <div class="btn-back-to-top bg0-hov" id="myBtn">
      <span class="symbol-btn-back-to-top">
          <i class="fa fa-angle-double-up" aria-hidden="true"></i>
      </span>
    </div>
</main>

<?php echo $footer; ?>

<!-- loader -->
<div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>

<?php echo $subsMenu; ?>

<script defer src="js/jquery.min.js"></script>
<script defer src="js/jquery-migrate-3.0.1.min.js"></script>
<script defer src="js/popper.min.js"></script>
<script defer src="js/bootstrap.min.js"></script>
<script defer src="js/jquery.easing.1.3.js"></script>
<script defer src="js/jquery.waypoints.min.js"></script>
<script defer src="js/jquery.stellar.min.js"></script>

<!-- blockUI -->
<script defer src="js/jquery.blockUI.js"></script>

<script defer type="text/javascript" src="js/t-datepicker.js?v=<?php echo VERSION['scripts']['datepicker']?>"></script>

<script defer src="js/swiper.js" type="text/javascript"></script>
<script defer src="js/swiper.min.js" type="text/javascript"></script>
<script defer src="js/swiper-custom.js?v=<?php echo VERSION['scripts']['swiper']?>" type="text/javascript"></script>

<script defer src="js/owl.carousel.min.js"></script>
<script defer src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>

<script defer src="https://cdn.jsdelivr.net/npm/jquery.maskedinput@1.4.1/src/jquery.maskedinput.min.js" type="text/javascript"></script>

<script defer src="js/jquery.flexslider.js"></script>

<script defer src="js/isotope.pkgd.js"></script>
<script defer src="js/imagesloaded.pkgd.js"></script>
<script defer src="js/masonry.pkgd.js"></script>
<script defer src="js/jquery.mb.YTPlayer.js"></script>
<script defer src="js/jquery.simple-text-rotator.min.js"></script>

<script defer src="js/jquery.magnific-popup.min.js"></script>
<script defer src="js/aos.js"></script>
<script defer src="js/jquery.animateNumber.min.js"></script>
<script defer src="js/bootstrap-datepicker.js"></script>
<script defer src="js/bootstrap-datepicker-ru.js"></script>
<script defer src="js/scrollax.min.js"></script>
<script defer src="js/main.min.js?v=<?php echo VERSION['scripts']['main']?>"></script>

<script defer src="js/wow.min.js"></script>

<script>
    var dates = [];
    var oneDayRange = [];
</script>

<!-- other scripts -->
<script defer src="js/script.min.js?v=<?php echo VERSION['scripts']['script']?>"></script>

<script defer src="js/cbpFWTabs.js"></script>

<script type="application/ld+json">{
    "@context": "https://schema.org",
    "@type": "WebPage",
    "url": "https://sonniyzaliv.ru/taxi2.php",
    "name": "Сонный Залив - такси в Сортавала. Такси города Сортавала по минимальным ценам, с описанием услуг и стоимости поездки",
    "description": "Потребовалась необходимость в такси, но не знаете куда позвонить? Мы поможем Вам более подробно ознакомиться и узнать: номера телефонов для вызова, официальный сайт, все тарифы и цены на услуги, а также, контакты служб такси в Сортавала по низким ценам",
    "inLanguage": "ru-RU",
    "publisher": {
        "@type": "Organization",
        "name": "Сонный Залив",
        "logo": {
            "@type": "ImageObject",
            "url": "https://sonniyzaliv.ru/images/logo.png"
        },
        "address": {
            "@type": "PostalAddress",
            "addressLocality": "Нукутталахти",
            "postalCode": "186790",
            "streetAddress": "Центральная, 52"
        },
        "contactPoint": [
            {
                "@type": "ContactPoint",
                "telephone": "+7 981 187-80-02",
                "contactType": "Александр"
            },
            {
                "@type": "ContactPoint",
                "telephone": "+7 981 750-44-89",
                "contactType": "Юлия"
            }
        ]
    }
}</script>

<!--  <script src="//code-ya.jivosite.com/widget/vEPLFIAKHV" async></script>-->

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-3HP381QVQQ"></script>
<script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'G-3HP381QVQQ');
</script>

<!-- Yandex.Metrika counter -->
<script type="text/javascript" >
    (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
        m[i].l=1*new Date();k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})
    (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

    ym(79760224, "init", {
        clickmap:true,
        trackLinks:true,
        accurateTrackBounce:true,
        webvisor:true
    });
</script>
<noscript><div><img src="https://mc.yandex.ru/watch/79760224" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!-- /Yandex.Metrika counter -->
</body>
</html>