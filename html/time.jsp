
<%
response.setContentType("text/event-stream"); 
response.setCharacterEncoding("UTF-8");
//out.print("retry: 1000\n");
try {
	while(true) {
		out.print("data: "+ new java.util.Date() +"\n\n");
		out.flush();
		Thread.sleep(1000);
	}
}catch(Exception e) {out.println(e);}
%>
