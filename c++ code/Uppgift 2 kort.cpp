#include "pch.h"
#include <iostream> 
#include <random>
#include <string>
#include <array> 
#include <algorithm>
#include <clocale>

using namespace std;

//Nedan är en funktion som slumpar ett värde mellan olika värden.
int Random(int min, int max) {
	std::random_device rd;
	std::mt19937 eng(rd());
	std::uniform_int_distribution<> distr(min, max);
	return distr(eng);
}

//Nedan är funktioner som returnerar meningar som ska skrivas ut.
int max3(int a, int b, int c) {
	if (b > c) {
		return a;
	}
}

std::ostream & get_cout2(int a, int b) {
	if (a == b) {
		return std::cout << "Spelaren är den slutgiltiga vinnaren av spelet.\n";
	}
}

std::ostream & get_cout3(int a, int b) {
	if (a == b) {
		return std::cout << "Motståndaren är den slutgiltiga vinnaren av spelet.\n";
	}
}

std::ostream & get_cout() {
	return std::cout << "Spelaren har dragit kortet spader ess.\n";
}

std::ostream & get_cout1() {
	return std::cout << "Spelaren har dragit kortet spader två.\n";
}

int main()
{ 
	setlocale(LC_ALL, "swedish");
	int zero = 0; 
	int two = 2;
	int KontoVal = 0;
	int SpelarePoang = 0;
	int MotstandarPoang = 0;
	while (KontoVal < 2)
	{
		double DecimalArray[52] = {1.4, 1.3, 1.2, 1.1, 2.4, 2.3, 2.2, 2.1, 3.4, 3.3, 3.2, 3.1, 4.4, 4.3, 4.2, 4.1, 5.4, 5.3, 5.2, 5.1, 6.4, 6.3, 6.2, 6.1, 7.4, 7.3, 7.2, 7.1, 8.4, 8.3, 8.2, 8.1, 9.4, 9.3, 9.2, 9.1, 10.4, 10.3, 10.2, 10.1, 11.4, 11.3, 11.2, 11.1, 12.4, 12.3, 12.2, 12.1, 13.4, 13.3, 13.2, 13.1};
		
		//Spelaren drar ett kort.
		int SpelareRandom = Random(0, 51);
		std::string SpelarKort; 
		if (DecimalArray[SpelareRandom] == 1.4) {
			get_cout();
			SpelarKort = "spader ess";
		}
		else if (DecimalArray[SpelareRandom] == 1.3) {
			cout << "Spelaren har dragit kortet hjärter ess.\n";
			SpelarKort = "hjärter ess";
		}
		else if (DecimalArray[SpelareRandom] == 1.2) {
			cout << "Spelaren har dragit kortet ruter ess.\n";
			SpelarKort = "ruter ess";
		}
		else if (DecimalArray[SpelareRandom] == 1.1) {
			cout << "Spelaren har dragit kortet klöver ess.\n";
			SpelarKort = "klöver ess";
		}
		else if (DecimalArray[SpelareRandom] == 2.4) {
			get_cout1();
			SpelarKort = "spader två";
		}
		else if (DecimalArray[SpelareRandom] == 2.3) {
			cout << "Spelaren har dragit kortet hjärter två.\n";
			SpelarKort = "hjärter två";
		}
		else if (DecimalArray[SpelareRandom] == 2.2) {
			cout << "Spelaren har dragit kortet ruter två.\n";
			SpelarKort = "ruter två";
		}
		else if (DecimalArray[SpelareRandom] == 2.1) {
			cout << "Spelaren har dragit kortet klöver två.\n";
			SpelarKort = "klöver två";
		}
		else if (DecimalArray[SpelareRandom] == 3.4) {
			cout << "Spelaren har dragit kortet spader tre.\n";
			SpelarKort = "spader tre";
		}
		else if (DecimalArray[SpelareRandom] == 3.3) {
			cout << "Spelaren har dragit kortet hjärter tre.\n";
			SpelarKort = "hjärter tre";
		}
		else if (DecimalArray[SpelareRandom] == 3.2) {
			cout << "Spelaren har dragit kortet ruter tre.\n";
			SpelarKort = "ruter tre";
		}
		else if (DecimalArray[SpelareRandom] == 3.1) {
			cout << "Spelaren har dragit kortet klöver tre.\n";
			SpelarKort = "klöver tre";
		}
		else if (DecimalArray[SpelareRandom] == 4.4) {
			cout << "Spelaren har dragit kortet spader fyra.\n";
			SpelarKort = "spader fyra";
		}
		else if (DecimalArray[SpelareRandom] == 4.3) {
			cout << "Spelaren har dragit kortet hjärter fyra.\n";
			SpelarKort = "hjärter fyra";
		}
		else if (DecimalArray[SpelareRandom] == 4.2) {
			cout << "Spelaren har dragit kortet ruter fyra.\n";
			SpelarKort = "ruter fyra";
		}
		else if (DecimalArray[SpelareRandom] == 4.1) {
			cout << "Spelaren har dragit kortet klöver fyra.\n";
			SpelarKort = "klöver fyra";
		}
		else if (DecimalArray[SpelareRandom] == 5.4) {
			cout << "Spelaren har dragit kortet spader fem.\n";
			SpelarKort = "spader fem";
		}
		else if (DecimalArray[SpelareRandom] == 5.3) {
			cout << "Spelaren har dragit kortet hjärter fem.\n";
			SpelarKort = "hjärter fem";
		}
		else if (DecimalArray[SpelareRandom] == 5.2) {
			cout << "Spelaren har dragit kortet ruter fem.\n";
			SpelarKort = "ruter fem";
		}
		else if (DecimalArray[SpelareRandom] == 5.1) {
			cout << "Spelaren har dragit kortet klöver fem.\n";
			SpelarKort = "klöver fem";
		}
		else if (DecimalArray[SpelareRandom] == 6.4) {
			cout << "Spelaren har dragit kortet spader sex.\n";
			SpelarKort = "spader sex";
		}
		else if (DecimalArray[SpelareRandom] == 6.3) {
			cout << "Spelaren har dragit kortet hjärter sex.\n";
			SpelarKort = "hjärter sex";
		}
		else if (DecimalArray[SpelareRandom] == 6.2) {
			cout << "Spelaren har dragit kortet ruter sex.\n";
			SpelarKort = "ruter sex";
		}
		else if (DecimalArray[SpelareRandom] == 6.1) {
			cout << "Spelaren har dragit kortet klöver sex.\n";
			SpelarKort = "klöver sex";
		}
		else if (DecimalArray[SpelareRandom] == 7.4) {
			cout << "Spelaren har dragit kortet spader sju.\n";
			SpelarKort = "spader sju";
		}
		else if (DecimalArray[SpelareRandom] == 7.3) {
			cout << "Spelaren har dragit kortet hjärter sju.\n";
			SpelarKort = "hjärter sju";
		}
		else if (DecimalArray[SpelareRandom] == 7.2) {
			cout << "Spelaren har dragit kortet ruter sju.\n";
			SpelarKort = "ruter sju";
		}
		else if (DecimalArray[SpelareRandom] == 7.1) {
			cout << "Spelaren har dragit kortet klöver sju.\n";
			SpelarKort = "klöver sju";
		}
		else if (DecimalArray[SpelareRandom] == 8.4) {
		cout << "Spelaren har dragit kortet spader åtta.\n";
		SpelarKort = "spader åtta";
		}
		else if (DecimalArray[SpelareRandom] == 8.3) {
		cout << "Spelaren har dragit kortet hjärter åtta.\n";
		SpelarKort = "hjärter åtta";
		}
		else if (DecimalArray[SpelareRandom] == 8.2) {
		cout << "Spelaren har dragit kortet ruter åtta.\n";
		SpelarKort = "ruter åtta";
		}
		else if (DecimalArray[SpelareRandom] == 8.1) {
		cout << "Spelaren har dragit kortet klöver åtta.\n";
		SpelarKort = "klöver åtta";
		}
		else if (DecimalArray[SpelareRandom] == 9.4) {
		cout << "Spelaren har dragit kortet spader nio.\n";
		SpelarKort = "spader nio";
		}
		else if (DecimalArray[SpelareRandom] == 9.3) {
		cout << "Spelaren har dragit kortet hjärter nio.\n";
		SpelarKort = "hjärter nio";
		}
		else if (DecimalArray[SpelareRandom] == 9.2) {
		cout << "Spelaren har dragit kortet ruter nio.\n";
		SpelarKort = "ruter nio";
		}
		else if (DecimalArray[SpelareRandom] == 9.1) {
		cout << "Spelaren har dragit kortet klöver tio.\n";
		SpelarKort = "klöver nio";
		}
		else if (DecimalArray[SpelareRandom] == 10.4) {
		cout << "Spelaren har dragit kortet spader tio.\n";
		SpelarKort = "spader tio";
		}
		else if (DecimalArray[SpelareRandom] == 10.3) {
		cout << "Spelaren har dragit kortet hjärter tio.\n";
		SpelarKort = "hjärter tio";
		}
		else if (DecimalArray[SpelareRandom] == 10.2) {
		cout << "Spelaren har dragit kortet ruter tio.\n";
		SpelarKort = "ruter tio";
		}
		else if (DecimalArray[SpelareRandom] == 10.1) {
		cout << "Spelaren har dragit kortet klöver tio.\n";
		SpelarKort = "klöver tio";
		}
		else if (DecimalArray[SpelareRandom] == 11.4) {
		cout << "Spelaren har dragit kortet spader knave.\n";
		SpelarKort = "spader knave";
		}
		else if (DecimalArray[SpelareRandom] == 11.3) {
		cout << "Spelaren har dragit kortet hjärter knave.\n";
		SpelarKort = "hjärter knave";
		}
		else if (DecimalArray[SpelareRandom] == 11.2) {
		cout << "Spelaren har dragit kortet ruter knave.\n";
		SpelarKort = "ruter knave";
		}
		else if (DecimalArray[SpelareRandom] == 11.1) {
		cout << "Spelaren har dragit kortet klöver knave.\n";
		SpelarKort = "klöver knave";
		}
		else if (DecimalArray[SpelareRandom] == 12.4) {
		cout << "Spelaren har dragit kortet spader dam.\n";
		SpelarKort = "spader dam";
		}
		else if (DecimalArray[SpelareRandom] == 12.3) {
		cout << "Spelaren har dragit kortet hjärter dam.\n";
		SpelarKort = "hjärter dam";
		}
		else if (DecimalArray[SpelareRandom] == 12.2) {
		cout << "Spelaren har dragit kortet ruter dam.\n";
		SpelarKort = "ruter dam";
		}
		else if (DecimalArray[SpelareRandom] == 12.1) {
		cout << "Spelaren har dragit kortet klöver dam.\n";
		SpelarKort = "klöver dam";
		}
		else if (DecimalArray[SpelareRandom] == 13.4) {
		cout << "Spelaren har dragit kortet spader kung.\n";
		SpelarKort = "spader kung";
		}
		else if (DecimalArray[SpelareRandom] == 13.3) {
		cout << "Spelaren har dragit kortet hjärter kung.\n";
		SpelarKort = "hjärter kung";
		}
		else if (DecimalArray[SpelareRandom] == 13.2) {
		cout << "Spelaren har dragit kortet ruter kung.\n";
		SpelarKort = "ruter kung";
		}
		else if (DecimalArray[SpelareRandom] == 13.1) {
		cout << "Spelaren har dragit kortet klöver kung.\n";
		SpelarKort = "klöver kung";
		}

		//Motståndaren drar ett kort.
		int MotstandarRandom = Random(0, 51);
		std::string MotstandarKort;
		if (DecimalArray[MotstandarRandom] == 1.4) {
			cout << "Motståndaren har dragit kortet spader ess.\n";
			MotstandarKort = "spader ess";
		}
		else if (DecimalArray[MotstandarRandom] == 1.3) {
			cout << "Motståndaren har dragit kortet hjärter ess.\n";
			MotstandarKort = "hjärter ess";
		}
		else if (DecimalArray[MotstandarRandom] == 1.2) {
			cout << "Motståndaren har dragit kortet ruter ess.\n";
			MotstandarKort = "ruter ess";
		}
		else if (DecimalArray[MotstandarRandom] == 1.1) {
			cout << "Motståndaren har dragit kortet klöver ess.\n";
			MotstandarKort = "klöver ess";
		}
		else if (DecimalArray[MotstandarRandom] == 2.4) {
			cout << "Motståndaren har dragit kortet spader två.\n";
			MotstandarKort = "spader två";
		}
		else if (DecimalArray[MotstandarRandom] == 2.3) {
			cout << "Motståndaren har dragit kortet hjärter två.\n";
			MotstandarKort = "hjärter två";
		}
		else if (DecimalArray[MotstandarRandom] == 2.2) {
			cout << "Motståndaren har dragit kortet ruter två.\n";
			MotstandarKort = "ruter två";
		}
		else if (DecimalArray[MotstandarRandom] == 2.1) {
			cout << "Motståndaren har dragit kortet klöver två.\n";
			MotstandarKort = "klöver två";
		}
		else if (DecimalArray[MotstandarRandom] == 3.4) {
			cout << "Motståndaren har dragit kortet spader tre.\n";
			MotstandarKort = "spader tre";
		}
		else if (DecimalArray[MotstandarRandom] == 3.3) {
			cout << "Motståndaren har dragit kortet hjärter tre.\n";
			MotstandarKort = "hjärter tre";
		}
		else if (DecimalArray[MotstandarRandom] == 3.2) {
			cout << "Motståndaren har dragit kortet ruter tre.\n";
			MotstandarKort = "ruter tre";
		}
		else if (DecimalArray[MotstandarRandom] == 3.1) {
			cout << "Motståndaren har dragit kortet klöver tre.\n";
			MotstandarKort = "klöver tre";
		}
		else if (DecimalArray[MotstandarRandom] == 4.4) {
			cout << "Motståndaren har dragit kortet spader fyra.\n";
			MotstandarKort = "spader fyra";
		}
		else if (DecimalArray[MotstandarRandom] == 4.3) {
			cout << "Motståndaren har dragit kortet hjärter fyra.\n";
			MotstandarKort = "hjärter fyra";
		}
		else if (DecimalArray[MotstandarRandom] == 4.2) {
			cout << "Motståndaren har dragit kortet ruter fyra.\n";
			MotstandarKort = "ruter fyra";
		}
		else if (DecimalArray[MotstandarRandom] == 4.1) {
			cout << "Motståndaren har dragit kortet klöver fyra.\n";
			MotstandarKort = "klöver fyra";
		}
		else if (DecimalArray[MotstandarRandom] == 5.4) {
			cout << "Motståndaren har dragit kortet spader fem.\n";
			MotstandarKort = "spader fem";
		}
		else if (DecimalArray[MotstandarRandom] == 5.3) {
			cout << "Motståndaren har dragit kortet hjärter fem.\n";
			MotstandarKort = "hjärter fem";
		}
		else if (DecimalArray[MotstandarRandom] == 5.2) {
			cout << "Motståndaren har dragit kortet ruter fem.\n";
			MotstandarKort = "ruter fem";
		}
		else if (DecimalArray[MotstandarRandom] == 5.1) {
			cout << "Motståndaren har dragit kortet klöver fem.\n";
			MotstandarKort = "klöver fem";
		}
		else if (DecimalArray[MotstandarRandom] == 6.4) {
			cout << "Motståndaren har dragit kortet spader sex.\n";
			MotstandarKort = "spader sex";
		}
		else if (DecimalArray[MotstandarRandom] == 6.3) {
			cout << "Motståndaren har dragit kortet hjärter sex.\n";
			MotstandarKort = "hjärter sex";
		}
		else if (DecimalArray[MotstandarRandom] == 6.2) {
			cout << "Motståndaren har dragit kortet ruter sex.\n";
			MotstandarKort = "ruter sex";
		}
		else if (DecimalArray[MotstandarRandom] == 6.1) {
			cout << "Motståndaren har dragit kortet klöver sex.\n";
			MotstandarKort = "klöver sex";
		}
		else if (DecimalArray[MotstandarRandom] == 7.4) {
			cout << "Motståndaren har dragit kortet spader sju.\n";
			MotstandarKort = "spader sju";
		}
		else if (DecimalArray[MotstandarRandom] == 7.3) {
			cout << "Motståndaren har dragit kortet hjärter sju.\n";
			MotstandarKort = "hjärter sju";
		}
		else if (DecimalArray[MotstandarRandom] == 7.2) {
			cout << "Motståndaren har dragit kortet ruter sju.\n";
			MotstandarKort = "ruter sju";
		}
		else if (DecimalArray[MotstandarRandom] == 7.1) {
			cout << "Motståndaren har dragit kortet klöver sju.\n";
			MotstandarKort = "klöver sju";
		}
		else if (DecimalArray[MotstandarRandom] == 8.4) {
			cout << "Motståndaren har dragit kortet spader åtta.\n";
			MotstandarKort = "spader åtta";
		}
		else if (DecimalArray[MotstandarRandom] == 8.3) {
			cout << "Motståndaren har dragit kortet hjärter åtta.\n";
			MotstandarKort = "hjärter åtta";
		}
		else if (DecimalArray[MotstandarRandom] == 8.2) {
			cout << "Motståndaren har dragit kortet ruter åtta.\n";
			MotstandarKort = "ruter åtta";
		}
		else if (DecimalArray[MotstandarRandom] == 8.1) {
			cout << "Motståndaren har dragit kortet klöver åtta.\n";
			MotstandarKort = "klöver åtta";
		}
		else if (DecimalArray[MotstandarRandom] == 9.4) {
			cout << "Motståndaren har dragit kortet spader nio.\n";
			MotstandarKort = "spader nio";
		}
		else if (DecimalArray[MotstandarRandom] == 9.3) {
			cout << "Motståndaren har dragit kortet hjärter nio.\n";
			MotstandarKort = "hjärter nio";
		}
		else if (DecimalArray[MotstandarRandom] == 9.2) {
			cout << "Motståndaren har dragit kortet ruter nio.\n";
			MotstandarKort = "ruter nio";
		}
		else if (DecimalArray[MotstandarRandom] == 9.1) {
			cout << "Motståndaren har dragit kortet klöver tio.\n";
			MotstandarKort = "klöver nio";
		}
		else if (DecimalArray[MotstandarRandom] == 10.4) {
			cout << "Motståndaren har dragit kortet spader tio.\n";
			MotstandarKort = "spader tio";
		}
		else if (DecimalArray[MotstandarRandom] == 10.3) {
			cout << "Motståndaren har dragit kortet hjärter tio.\n";
			MotstandarKort = "hjärter tio";
		}
		else if (DecimalArray[MotstandarRandom] == 10.2) {
			cout << "Motståndaren har dragit kortet ruter tio.\n";
			MotstandarKort = "ruter tio";
		}
		else if (DecimalArray[MotstandarRandom] == 10.1) {
			cout << "Motståndaren har dragit kortet klöver tio.\n";
			MotstandarKort = "klöver tio";
		}
		else if (DecimalArray[MotstandarRandom] == 11.4) {
			cout << "Motståndaren har dragit kortet spader knave.\n";
			MotstandarKort = "spader knave";
		}
		else if (DecimalArray[MotstandarRandom] == 11.3) {
			cout << "Motståndaren har dragit kortet hjärter knave.\n";
			MotstandarKort = "hjärter knave";
		}
		else if (DecimalArray[MotstandarRandom] == 11.2) {
			cout << "Motståndaren har dragit kortet ruter knave.\n";
			MotstandarKort = "ruter knave";
		}
		else if (DecimalArray[MotstandarRandom] == 11.1) {
			cout << "Motståndaren har dragit kortet klöver knave.\n";
			MotstandarKort = "klöver knave";
		}
		else if (DecimalArray[MotstandarRandom] == 12.4) {
			cout << "Motståndaren har dragit kortet spader dam.\n";
			MotstandarKort = "spader dam";
		}
		else if (DecimalArray[MotstandarRandom] == 12.3) {
			cout << "Motståndaren har dragit kortet hjärter dam.\n";
			MotstandarKort = "hjärter dam";
		}
		else if (DecimalArray[MotstandarRandom] == 12.2) {
			cout << "Motståndaren har dragit kortet ruter dam.\n";
			MotstandarKort = "ruter dam";
		}
		else if (DecimalArray[MotstandarRandom] == 12.1) {
			cout << "Motståndaren har dragit kortet klöver dam.\n";
			MotstandarKort = "klöver dam";
		}
		else if (DecimalArray[MotstandarRandom] == 13.4) {
			cout << "Motståndaren har dragit kortet spader kung.\n";
			MotstandarKort = "spader kung";
		}
		else if (DecimalArray[MotstandarRandom] == 13.3) {
			cout << "Motståndaren har dragit kortet hjärter kung.\n";
			MotstandarKort = "hjärter kung";
		}
		else if (DecimalArray[MotstandarRandom] == 13.2) {
			cout << "Motståndaren har dragit kortet ruter kung.\n";
			MotstandarKort = "ruter kung";
		}
		else if (DecimalArray[MotstandarRandom] == 13.1) {
			cout << "Motståndaren har dragit kortet klöver kung.\n";
			MotstandarKort = "klöver kung";
		}
		
		//Vinnaren av spelomgången koras genom att jämföra korten.
		if (DecimalArray[MotstandarRandom] > DecimalArray[SpelareRandom]) {
			cout << "Motståndarens kort " << MotstandarKort << " har högre valör än spelarens kort " << SpelarKort << ".\nMotståndaren har vunnit denna omgång.";
			MotstandarPoang++;
			KontoVal = MotstandarPoang;
		}
		else if (DecimalArray[MotstandarRandom] < DecimalArray[SpelareRandom]) {
			cout << "Spelarens kort " << SpelarKort << " har högre valör än motståndarens kort " << MotstandarKort << ".\nSpelaren har vunnit denna omgång.";
			SpelarePoang++;
			KontoVal = SpelarePoang;
		}
		else if (DecimalArray[MotstandarRandom] == DecimalArray[SpelareRandom]) {
			cout << "Korten har samma valör. Det är oavgjort. Ingen vann denna omgång.";
		}
		
		//Vinnaren av spelet koras genom att se på poängställningen.
		cout << "\nDet står " << max3(SpelarePoang, KontoVal, zero) << "-" << MotstandarPoang << " mellan spelaren och motståndaren.\n\n";

		get_cout2(SpelarePoang, two);
		get_cout3(MotstandarPoang, two);
	}
	cin.ignore();
	cin.get();
	return 0;
}