import java.io.PrintWriter;
protected void doPost(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {
		// TODO Auto-generated method stub
		doGet(request, response);
		response.setContentType("text/html");

        String requestMethod = request.getMethod();
        String requestURL = request.getRequestURL().toString();
        String protocol = request.getProtocol();
        String remoteAddr = request.getRemoteAddr();

        PrintWriter out = response.getWriter();
        out.println("<html><head><title>Server Information</title></head><body>");
        out.println("<h2>Server Request Information</h2>");
        out.println("<p>Request Method: " + requestMethod + "</p>");
        out.println("<p>Request URL: " + requestURL + "</p>");
        out.println("<p>Protocol: " + protocol + "</p>");
        out.println("<p>Remote Address: " + remoteAddr + "</p>");
        out.println("</body></html>");
        out.close();
	}