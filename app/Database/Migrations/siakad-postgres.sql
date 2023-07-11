--
-- PostgreSQL database dump
--

-- Dumped from database version 14.1
-- Dumped by pg_dump version 14.1

-- Started on 2023-07-06 01:02:49

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET xmloption = content;
SET client_min_messages = warning;
SET row_security = off;

--
-- TOC entry 3398 (class 1262 OID 94886)
-- Name: siakad; Type: DATABASE; Schema: -; Owner: postgres
--

CREATE DATABASE "siakad" WITH TEMPLATE = template0 ENCODING = 'UTF8' LOCALE = 'Indonesian_Indonesia.1252';


ALTER DATABASE "siakad" OWNER TO postgres;

\connect "siakad"

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET xmloption = content;
SET client_min_messages = warning;
SET row_security = off;

--
-- TOC entry 3 (class 2615 OID 2200)
-- Name: public; Type: SCHEMA; Schema: -; Owner: postgres
--

CREATE SCHEMA public;


ALTER SCHEMA public OWNER TO postgres;

--
-- TOC entry 3399 (class 0 OID 0)
-- Dependencies: 3
-- Name: SCHEMA public; Type: COMMENT; Schema: -; Owner: postgres
--

COMMENT ON SCHEMA public IS 'standard public schema';


SET default_tablespace = '';

SET default_table_access_method = heap;

--
-- TOC entry 210 (class 1259 OID 94963)
-- Name: Program Studi; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public."Program Studi" (
    id integer NOT NULL,
    nama character varying(255),
    program_pendidikan character varying(50),
    akreditasi character varying(50),
    sk_akreditasi character varying(255),
    CONSTRAINT "Program Studi_akreditasi_check" CHECK (((akreditasi)::text = ANY ((ARRAY['Baik'::character varying, 'Baik Sekali'::character varying, 'Unggul'::character varying])::text[]))),
    CONSTRAINT "Program Studi_program_pendidikan_check" CHECK (((program_pendidikan)::text = ANY ((ARRAY['Diploma III'::character varying, 'Diploma IV'::character varying])::text[])))
);


ALTER TABLE public."Program Studi" OWNER TO postgres;

--
-- TOC entry 209 (class 1259 OID 94962)
-- Name: Program Studi_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public."Program Studi_id_seq"
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public."Program Studi_id_seq" OWNER TO postgres;

--
-- TOC entry 3400 (class 0 OID 0)
-- Dependencies: 209
-- Name: Program Studi_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public."Program Studi_id_seq" OWNED BY public."Program Studi".id;


--
-- TOC entry 224 (class 1259 OID 95068)
-- Name: Transkrip Nilai; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public."Transkrip Nilai" (
    id integer NOT NULL,
    taruna integer,
    ijazah integer,
    program_studi integer
);


ALTER TABLE public."Transkrip Nilai" OWNER TO postgres;

--
-- TOC entry 223 (class 1259 OID 95067)
-- Name: Transkrip Nilai_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public."Transkrip Nilai_id_seq"
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public."Transkrip Nilai_id_seq" OWNER TO postgres;

--
-- TOC entry 3401 (class 0 OID 0)
-- Dependencies: 223
-- Name: Transkrip Nilai_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public."Transkrip Nilai_id_seq" OWNED BY public."Transkrip Nilai".id;


--
-- TOC entry 220 (class 1259 OID 95022)
-- Name: ijazah; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.ijazah (
    id integer NOT NULL,
    taruna integer,
    program_studi integer,
    tanggal_ijazah date,
    tanggal_pengesahan date,
    gelar_akademik character varying(255),
    nomer_sk character varying(255),
    wakil_direktur integer,
    direktur integer,
    nomer_ijazah character varying(255),
    nomer_seri character varying(255),
    tanggal_yudisium date,
    judul_kkw character varying(255)
);


ALTER TABLE public.ijazah OWNER TO postgres;

--
-- TOC entry 219 (class 1259 OID 95021)
-- Name: ijazah_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.ijazah_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.ijazah_id_seq OWNER TO postgres;

--
-- TOC entry 3402 (class 0 OID 0)
-- Dependencies: 219
-- Name: ijazah_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.ijazah_id_seq OWNED BY public.ijazah.id;


--
-- TOC entry 214 (class 1259 OID 94985)
-- Name: kota; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.kota (
    id integer NOT NULL,
    kode_kota character varying(255),
    nama character varying(255)
);


ALTER TABLE public.kota OWNER TO postgres;

--
-- TOC entry 213 (class 1259 OID 94984)
-- Name: kota_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.kota_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.kota_id_seq OWNER TO postgres;

--
-- TOC entry 3403 (class 0 OID 0)
-- Dependencies: 213
-- Name: kota_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.kota_id_seq OWNED BY public.kota.id;


--
-- TOC entry 212 (class 1259 OID 94974)
-- Name: matakuliah; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.matakuliah (
    id integer NOT NULL,
    kode character varying(255),
    matakuliah character varying(255),
    sks integer,
    nilai_angka integer,
    nilai_huruf character varying(2),
    semester character varying(50),
    CONSTRAINT matakuliah_nilai_huruf_check CHECK (((nilai_huruf)::text = ANY ((ARRAY['A'::character varying, 'B'::character varying, 'C'::character varying, 'D'::character varying, 'E'::character varying])::text[]))),
    CONSTRAINT matakuliah_semester_check CHECK (((semester)::text = ANY ((ARRAY['semester I'::character varying, 'semester II'::character varying, 'semester III'::character varying, 'semester IV'::character varying, 'semester V'::character varying, 'semester VI'::character varying, 'semester VII'::character varying, 'semester VIII'::character varying])::text[])))
);


ALTER TABLE public.matakuliah OWNER TO postgres;

--
-- TOC entry 211 (class 1259 OID 94973)
-- Name: matakuliah_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.matakuliah_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.matakuliah_id_seq OWNER TO postgres;

--
-- TOC entry 3404 (class 0 OID 0)
-- Dependencies: 211
-- Name: matakuliah_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.matakuliah_id_seq OWNED BY public.matakuliah.id;


--
-- TOC entry 222 (class 1259 OID 95051)
-- Name: nilai; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.nilai (
    id integer NOT NULL,
    taruna integer,
    nilai_angka integer,
    nilai_huruf character varying(2),
    matakuliah integer
);


ALTER TABLE public.nilai OWNER TO postgres;

--
-- TOC entry 221 (class 1259 OID 95050)
-- Name: nilai_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.nilai_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.nilai_id_seq OWNER TO postgres;

--
-- TOC entry 3405 (class 0 OID 0)
-- Dependencies: 221
-- Name: nilai_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.nilai_id_seq OWNED BY public.nilai.id;


--
-- TOC entry 216 (class 1259 OID 94994)
-- Name: pejabat; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.pejabat (
    id integer NOT NULL,
    nama character varying(255),
    nip character varying(255),
    golongan character varying(255),
    jabatan character varying(255)
);


ALTER TABLE public.pejabat OWNER TO postgres;

--
-- TOC entry 215 (class 1259 OID 94993)
-- Name: pejabat_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.pejabat_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.pejabat_id_seq OWNER TO postgres;

--
-- TOC entry 3406 (class 0 OID 0)
-- Dependencies: 215
-- Name: pejabat_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.pejabat_id_seq OWNED BY public.pejabat.id;


--
-- TOC entry 218 (class 1259 OID 95003)
-- Name: taruna; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.taruna (
    id integer NOT NULL,
    nama character varying(255),
    nomer_taruna character varying(255),
    tempat_lahir integer,
    tanggal_lahir date,
    program_studi integer,
    foto character varying(255)
);


ALTER TABLE public.taruna OWNER TO postgres;

--
-- TOC entry 217 (class 1259 OID 95002)
-- Name: taruna_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.taruna_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.taruna_id_seq OWNER TO postgres;

--
-- TOC entry 3407 (class 0 OID 0)
-- Dependencies: 217
-- Name: taruna_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.taruna_id_seq OWNED BY public.taruna.id;


--
-- TOC entry 3199 (class 2604 OID 94966)
-- Name: Program Studi id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public."Program Studi" ALTER COLUMN id SET DEFAULT nextval('public."Program Studi_id_seq"'::regclass);


--
-- TOC entry 3210 (class 2604 OID 95071)
-- Name: Transkrip Nilai id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public."Transkrip Nilai" ALTER COLUMN id SET DEFAULT nextval('public."Transkrip Nilai_id_seq"'::regclass);


--
-- TOC entry 3208 (class 2604 OID 95025)
-- Name: ijazah id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.ijazah ALTER COLUMN id SET DEFAULT nextval('public.ijazah_id_seq'::regclass);


--
-- TOC entry 3205 (class 2604 OID 94988)
-- Name: kota id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.kota ALTER COLUMN id SET DEFAULT nextval('public.kota_id_seq'::regclass);


--
-- TOC entry 3202 (class 2604 OID 94977)
-- Name: matakuliah id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.matakuliah ALTER COLUMN id SET DEFAULT nextval('public.matakuliah_id_seq'::regclass);


--
-- TOC entry 3209 (class 2604 OID 95054)
-- Name: nilai id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.nilai ALTER COLUMN id SET DEFAULT nextval('public.nilai_id_seq'::regclass);


--
-- TOC entry 3206 (class 2604 OID 94997)
-- Name: pejabat id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.pejabat ALTER COLUMN id SET DEFAULT nextval('public.pejabat_id_seq'::regclass);


--
-- TOC entry 3207 (class 2604 OID 95006)
-- Name: taruna id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.taruna ALTER COLUMN id SET DEFAULT nextval('public.taruna_id_seq'::regclass);


--
-- TOC entry 3378 (class 0 OID 94963)
-- Dependencies: 210
-- Data for Name: Program Studi; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public."Program Studi" (id, nama, program_pendidikan, akreditasi, sk_akreditasi) FROM stdin;
\.


--
-- TOC entry 3392 (class 0 OID 95068)
-- Dependencies: 224
-- Data for Name: Transkrip Nilai; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public."Transkrip Nilai" (id, taruna, ijazah, program_studi) FROM stdin;
\.


--
-- TOC entry 3388 (class 0 OID 95022)
-- Dependencies: 220
-- Data for Name: ijazah; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.ijazah (id, taruna, program_studi, tanggal_ijazah, tanggal_pengesahan, gelar_akademik, nomer_sk, wakil_direktur, direktur, nomer_ijazah, nomer_seri, tanggal_yudisium, judul_kkw) FROM stdin;
\.


--
-- TOC entry 3382 (class 0 OID 94985)
-- Dependencies: 214
-- Data for Name: kota; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.kota (id, kode_kota, nama) FROM stdin;
\.


--
-- TOC entry 3380 (class 0 OID 94974)
-- Dependencies: 212
-- Data for Name: matakuliah; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.matakuliah (id, kode, matakuliah, sks, nilai_angka, nilai_huruf, semester) FROM stdin;
\.


--
-- TOC entry 3390 (class 0 OID 95051)
-- Dependencies: 222
-- Data for Name: nilai; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.nilai (id, taruna, nilai_angka, nilai_huruf, matakuliah) FROM stdin;
\.


--
-- TOC entry 3384 (class 0 OID 94994)
-- Dependencies: 216
-- Data for Name: pejabat; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.pejabat (id, nama, nip, golongan, jabatan) FROM stdin;
\.


--
-- TOC entry 3386 (class 0 OID 95003)
-- Dependencies: 218
-- Data for Name: taruna; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.taruna (id, nama, nomer_taruna, tempat_lahir, tanggal_lahir, program_studi, foto) FROM stdin;
\.


--
-- TOC entry 3408 (class 0 OID 0)
-- Dependencies: 209
-- Name: Program Studi_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public."Program Studi_id_seq"', 1, false);


--
-- TOC entry 3409 (class 0 OID 0)
-- Dependencies: 223
-- Name: Transkrip Nilai_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public."Transkrip Nilai_id_seq"', 1, false);


--
-- TOC entry 3410 (class 0 OID 0)
-- Dependencies: 219
-- Name: ijazah_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.ijazah_id_seq', 1, false);


--
-- TOC entry 3411 (class 0 OID 0)
-- Dependencies: 213
-- Name: kota_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.kota_id_seq', 1, false);


--
-- TOC entry 3412 (class 0 OID 0)
-- Dependencies: 211
-- Name: matakuliah_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.matakuliah_id_seq', 1, false);


--
-- TOC entry 3413 (class 0 OID 0)
-- Dependencies: 221
-- Name: nilai_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.nilai_id_seq', 1, false);


--
-- TOC entry 3414 (class 0 OID 0)
-- Dependencies: 215
-- Name: pejabat_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.pejabat_id_seq', 1, false);


--
-- TOC entry 3415 (class 0 OID 0)
-- Dependencies: 217
-- Name: taruna_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.taruna_id_seq', 1, false);


--
-- TOC entry 3212 (class 2606 OID 94972)
-- Name: Program Studi Program Studi_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public."Program Studi"
    ADD CONSTRAINT "Program Studi_pkey" PRIMARY KEY (id);


--
-- TOC entry 3226 (class 2606 OID 95073)
-- Name: Transkrip Nilai Transkrip Nilai_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public."Transkrip Nilai"
    ADD CONSTRAINT "Transkrip Nilai_pkey" PRIMARY KEY (id);


--
-- TOC entry 3222 (class 2606 OID 95029)
-- Name: ijazah ijazah_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.ijazah
    ADD CONSTRAINT ijazah_pkey PRIMARY KEY (id);


--
-- TOC entry 3216 (class 2606 OID 94992)
-- Name: kota kota_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.kota
    ADD CONSTRAINT kota_pkey PRIMARY KEY (id);


--
-- TOC entry 3214 (class 2606 OID 94983)
-- Name: matakuliah matakuliah_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.matakuliah
    ADD CONSTRAINT matakuliah_pkey PRIMARY KEY (id);


--
-- TOC entry 3224 (class 2606 OID 95056)
-- Name: nilai nilai_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.nilai
    ADD CONSTRAINT nilai_pkey PRIMARY KEY (id);


--
-- TOC entry 3218 (class 2606 OID 95001)
-- Name: pejabat pejabat_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.pejabat
    ADD CONSTRAINT pejabat_pkey PRIMARY KEY (id);


--
-- TOC entry 3220 (class 2606 OID 95010)
-- Name: taruna taruna_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.taruna
    ADD CONSTRAINT taruna_pkey PRIMARY KEY (id);


--
-- TOC entry 3236 (class 2606 OID 95079)
-- Name: Transkrip Nilai Transkrip Nilai_ijazah_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public."Transkrip Nilai"
    ADD CONSTRAINT "Transkrip Nilai_ijazah_fkey" FOREIGN KEY (ijazah) REFERENCES public.ijazah(id);


--
-- TOC entry 3237 (class 2606 OID 95084)
-- Name: Transkrip Nilai Transkrip Nilai_program_studi_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public."Transkrip Nilai"
    ADD CONSTRAINT "Transkrip Nilai_program_studi_fkey" FOREIGN KEY (program_studi) REFERENCES public."Program Studi"(id);


--
-- TOC entry 3235 (class 2606 OID 95074)
-- Name: Transkrip Nilai Transkrip Nilai_taruna_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public."Transkrip Nilai"
    ADD CONSTRAINT "Transkrip Nilai_taruna_fkey" FOREIGN KEY (taruna) REFERENCES public.taruna(id);


--
-- TOC entry 3232 (class 2606 OID 95045)
-- Name: ijazah ijazah_direktur_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.ijazah
    ADD CONSTRAINT ijazah_direktur_fkey FOREIGN KEY (direktur) REFERENCES public.pejabat(id);


--
-- TOC entry 3230 (class 2606 OID 95035)
-- Name: ijazah ijazah_program_studi_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.ijazah
    ADD CONSTRAINT ijazah_program_studi_fkey FOREIGN KEY (program_studi) REFERENCES public."Program Studi"(id);


--
-- TOC entry 3229 (class 2606 OID 95030)
-- Name: ijazah ijazah_taruna_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.ijazah
    ADD CONSTRAINT ijazah_taruna_fkey FOREIGN KEY (taruna) REFERENCES public.taruna(id);


--
-- TOC entry 3231 (class 2606 OID 95040)
-- Name: ijazah ijazah_wakil_direktur_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.ijazah
    ADD CONSTRAINT ijazah_wakil_direktur_fkey FOREIGN KEY (wakil_direktur) REFERENCES public.pejabat(id);


--
-- TOC entry 3234 (class 2606 OID 95062)
-- Name: nilai nilai_matakuliah_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.nilai
    ADD CONSTRAINT nilai_matakuliah_fkey FOREIGN KEY (matakuliah) REFERENCES public.matakuliah(id);


--
-- TOC entry 3233 (class 2606 OID 95057)
-- Name: nilai nilai_taruna_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.nilai
    ADD CONSTRAINT nilai_taruna_fkey FOREIGN KEY (taruna) REFERENCES public.taruna(id);


--
-- TOC entry 3228 (class 2606 OID 95016)
-- Name: taruna taruna_program_studi_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.taruna
    ADD CONSTRAINT taruna_program_studi_fkey FOREIGN KEY (program_studi) REFERENCES public."Program Studi"(id);


--
-- TOC entry 3227 (class 2606 OID 95011)
-- Name: taruna taruna_tempat_lahir_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.taruna
    ADD CONSTRAINT taruna_tempat_lahir_fkey FOREIGN KEY (tempat_lahir) REFERENCES public.kota(id);


-- Completed on 2023-07-06 01:02:50

--
-- PostgreSQL database dump complete
--

