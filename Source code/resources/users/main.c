/* -*- Mode: C; indent-tabs-mode: t; c-basic-offset: 4; tab-width: 4 -*- */
/*
 * main.c
 * Copyright (C) Nehal 2011 <total.sniper@gmail.com>
 * 
 * Sniper_GrubManager is free software: you can redistribute it and/or modify it
 * under the terms of the GNU General Public License as published by the
 * Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 * 
 * Sniper_GrubManager is distributed in the hope that it will be useful, but
 * WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
 * See the GNU General Public License for more details.
 * 
 * You should have received a copy of the GNU General Public License along
 * with this program.  If not, see <http://www.gnu.org/licenses/>.
 */

#include <config.h>
#include <gtk/gtk.h>


#include <glib/gi18n.h>



/* For testing propose use the local (not installed) ui file */
/* #define UI_FILE PACKAGE_DATA_DIR"/sniper_grubmanager/ui/sniper_grubmanager.ui" */
#define UI_FILE "src/sniper_grubmanager.ui"

/* Signal handlers */
/* Note: These may not be declared static because signal autoconnection
 * only works with non-static methods
 */

/* Called when the window is closed */

GtkLabel *label;
GtkLabel *label1;
GtkWidget *dialog,*dialog1,*dialog2;
GtkWidget *window1;
gint temp=0;

gchar *filename1,*filename2;
char ch;

void
destroy (GtkWidget *widget, gpointer data)
{
	gtk_main_quit ();
}

static GtkWidget*
create_window (void)
{
	GtkWidget *window;
	GtkBuilder *builder;
	GError* error = NULL;

	
	/* Load UI from file */
	builder = gtk_builder_new ();
	if (!gtk_builder_add_from_file (builder, UI_FILE, &error))
	{
		g_warning ("Couldn't load builder file: %s", error->message);
		g_error_free (error);
	}

	/* Auto-connect signal handlers */
	gtk_builder_connect_signals (builder, NULL);
	label = GTK_WIDGET (gtk_builder_get_object (builder, "label1"));
	label1 = GTK_WIDGET (gtk_builder_get_object (builder, "label2"));
	window1 = GTK_WIDGET (gtk_builder_get_object (builder, "window"));
	/* Get the window object from the ui file */
	window = GTK_WIDGET (gtk_builder_get_object (builder, "window"));
	g_object_unref (builder);
	
	return window;
}

void
on_filebtn1_select (GtkFileChooser *filechooser, gpointer user_data)
{
	gtk_label_set_text (label,gtk_file_chooser_get_filename (filechooser));
	filename1=gtk_file_chooser_get_filename (filechooser);
}

void
on_filebtn2_select (GtkFileChooser *filechooser, gpointer user_data)
{
	gtk_label_set_text (label1,gtk_file_chooser_get_filename (filechooser));
	filename2=gtk_file_chooser_get_filename (filechooser);
}

void
on_click_exit (GtkFileChooser *filechooser, gpointer user_data)
{
	gtk_main_quit ();
}

void
on_click_about (GtkFileChooser *filechooser, gpointer user_data)
{
		dialog1 = gtk_message_dialog_new (window1,
                                 GTK_DIALOG_DESTROY_WITH_PARENT,
                                 GTK_MESSAGE_QUESTION,
                                 GTK_BUTTONS_CLOSE,
                                 "Application version = 0.1\n\nLicence = Freeware (General Public Licence 2)\n\nDeveloper = Nehal(Sniper)\n\n\nIf you found any bug please kindly report us at total.sniper@gmail.com");
		g_signal_connect_swapped (dialog1,
                             "response",
                             G_CALLBACK (gtk_widget_destroy),
                             dialog1);
		gtk_widget_show_all (dialog1);
}

void
on_click_manage (GtkButton *button, gpointer user_data)
{
	FILE *fp1,*fp2;
	
	fp1=fopen(filename1,"r");
	fp2=fopen(filename2,"a");
	
	ch=fgetc(fp1);
	while(ch != EOF)
	{
		if(ch == 't')
		{
			ch=fgetc(fp1);
			if(ch == 'i')
			{
				ch=fgetc(fp1);
				if(ch == 't')
				{
					ch=fgetc(fp1);
					if(ch == 'l')
					{
						ch=fgetc(fp1);
						if(ch == 'e')
						{
							ch='t';
							fputc (ch,fp2);
							ch='i';
							fputc (ch,fp2);
							ch='t';
							fputc (ch,fp2);
							ch='l';
							fputc (ch,fp2);
							ch='e';
							fputc (ch,fp2);
							ch=fgetc(fp1);
							while(ch != EOF)
							{
								fputc (ch,fp2);
								ch=fgetc(fp1);
							}
							temp=1;
						}		
					}
				}	
			}
		}
		ch=fgetc(fp1);	
	}
	fclose(fp1);
	fclose(fp2);

	if(temp==0)
	{
		dialog = gtk_message_dialog_new (window1,
                                 GTK_DIALOG_DESTROY_WITH_PARENT,
                                 GTK_MESSAGE_ERROR,
                                 GTK_BUTTONS_CLOSE,
                                 "Sorry, the file you choosed is not a grub config file.\n\nWould you like to revert back?\n\n\n\nReport the bug at total.sniper@gmail.com if you are sure about grub file.");
		g_signal_connect_swapped (dialog,
                             "response",
                             G_CALLBACK (gtk_widget_destroy),
                             dialog);
		
		
		gtk_widget_show_all (dialog);
	}
	else
	{
		dialog2 = gtk_message_dialog_new (window1,
                                 GTK_DIALOG_DESTROY_WITH_PARENT,
                                 GTK_MESSAGE_INFO,
                                 GTK_BUTTONS_CLOSE,
                                 "Success!!\n\n\nYour Grub has been Successfully managed please restart the system to check.");
		g_signal_connect_swapped (dialog2,
                             "response",
                             G_CALLBACK (gtk_widget_destroy),
                             dialog2);
		gtk_widget_show_all (dialog2);
	}
}

int
main (int argc, char *argv[])
{
 	GtkWidget *window;


#ifdef ENABLE_NLS
	bindtextdomain (GETTEXT_PACKAGE, PACKAGE_LOCALE_DIR);
	bind_textdomain_codeset (GETTEXT_PACKAGE, "UTF-8");
	textdomain (GETTEXT_PACKAGE);
#endif

	
	gtk_init (&argc, &argv);

	window = create_window ();
	gtk_widget_show (window);

	gtk_main ();
	return 0;
}
